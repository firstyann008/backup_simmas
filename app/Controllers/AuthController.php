<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends BaseController
{
    private function getJwtSecret(): string
    {
        $key = env('encryption.key');
        if (str_starts_with($key, 'hex2bin:')) {
            $key = hex2bin(substr($key, 8));
        }
        return $key ?: 'simmas-secret';
    }

    public function login()
    {
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        $email = isset($payload['email']) ? strtolower(trim($payload['email'])) : null;
        $password = $payload['password'] ?? null;

        if (!$email || !$password) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['message' => 'Email dan password wajib diisi']);
        }

        $db = db_connect();
        // Normalize email to lower-case for lookup
        $user = $db->table('users')->where('email', $email)->get()->getRowArray();

        // Flexible password check to handle legacy/plain/MD5/BCrypt
        $isValid = false;
        if ($user) {
            $stored = (string) ($user['password'] ?? '');
            if ($stored === md5($password)) {
                $isValid = true; // MD5 (legacy)
            } elseif ($stored === $password) {
                $isValid = true; // plain (fallback for legacy data)
            } elseif (strlen($stored) > 0 && password_get_info($stored)['algo'] !== 0) {
                $isValid = password_verify($password, $stored); // password_hash
            }
        }

        if (!$user || !$isValid) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED)
                ->setJSON(['message' => 'Email atau password salah']);
        }

        $now = time();
        $payload = [
            'iss' => 'simmas-ci4',
            'iat' => $now,
            'nbf' => $now,
            'exp' => $now + 60 * 60 * 4,
            'sub' => (string)$user['id'],
            'role' => $user['role'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];

        $token = JWT::encode($payload, $this->getJwtSecret(), 'HS256');

        return $this->response->setJSON([
            'access_token' => $token,
            'token' => $token, // alias for frontend compatibility
            'token_type' => 'Bearer',
            'expires_in' => 60 * 60 * 4,
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ],
        ]);
    }

    public function register()
    {
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirmation' => 'required|matches[password]',
            'nis' => 'required|min_length[3]|max_length[20]|is_unique[siswa.nis]',
            'kelas' => 'permit_empty|max_length[50]',
            'jurusan' => 'permit_empty|max_length[10]',
            'telepon' => 'permit_empty|max_length[20]',
            'alamat' => 'permit_empty|max_length[500]'
        ]);

        if (!$validation->run($payload)) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['message' => 'Validasi gagal', 'errors' => $validation->getErrors()]);
        }

        $db = db_connect();
        
        // Mulai transaksi
        $db->transStart();
        
        try {
            // Insert ke tabel users
            $userData = [
                'name' => $payload['name'],
                'email' => $payload['email'],
                'password' => md5($payload['password']), // Menggunakan MD5 seperti sistem yang ada
                'role' => 'siswa',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $db->table('users')->insert($userData);
            $userId = $db->insertID();
            
            // Insert ke tabel siswa
            $siswaData = [
                'user_id' => $userId,
                'nis' => $payload['nis'],
                'kelas' => $payload['kelas'] ?? null,
                'jurusan' => $payload['jurusan'] ?? null,
                'telepon' => $payload['telepon'] ?? null,
                'alamat' => $payload['alamat'] ?? null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $db->table('siswa')->insert($siswaData);
            
            // Commit transaksi
            $db->transComplete();
            
            if ($db->transStatus() === false) {
                throw new \Exception('Gagal menyimpan data');
            }
            
            return $this->response->setStatusCode(ResponseInterface::HTTP_CREATED)
                ->setJSON([
                    'message' => 'Registrasi berhasil',
                    'user' => [
                        'id' => $userId,
                        'name' => $payload['name'],
                        'email' => $payload['email'],
                        'role' => 'siswa'
                    ]
                ]);
                
        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['message' => 'Gagal mendaftar: ' . $e->getMessage()]);
        }
    }

    public function me()
    {
        $user = $this->request->user ?? null;
        if (!$user) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED)
                ->setJSON(['message' => 'Unauthorized']);
        }

        return $this->response->setJSON(['user' => $user]);
    }
}



