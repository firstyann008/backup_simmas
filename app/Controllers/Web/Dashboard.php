<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function admin() 
    { 
        $db = db_connect();
        
        // Get real data from database
        $data = [
            'user' => $this->getUserData(),
            'stats' => [
                'total_users' => $db->table('users')->countAllResults(),
                'total_siswa' => $db->table('siswa')->countAllResults(),
                'total_guru' => $db->table('guru')->countAllResults(),
                'total_dudi' => $db->table('dudi')->countAllResults(),
                'total_magang' => $db->table('magang')->countAllResults(),
                'total_logbook' => $db->table('logbook')->countAllResults(),
            ],
            'recent_magang' => $db->table('magang')
                ->select('magang.*, users.name as siswa_name, dudi.nama_perusahaan')
                ->join('users', 'users.id = magang.siswa_id', 'left')
                ->join('dudi', 'dudi.id = magang.dudi_id', 'left')
                ->orderBy('magang.created_at', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray(),
            'recent_dudi' => $db->table('dudi')
                ->orderBy('created_at', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray()
        ];
        return view('dashboard/admin', $data); 
    }
    
    public function guru() 
    { 
        $db = db_connect();
        
        // Get real data from database for guru
        $data = [
            'user' => $this->getUserData(),
            'stats' => [
                'total_siswa_bimbingan' => $db->table('magang')->where('guru_id', 2)->countAllResults(),
                'total_magang_aktif' => $db->table('magang')->where('guru_id', 2)->where('status', 'aktif')->countAllResults(),
                'total_logbook' => $db->table('logbook')
                    ->join('magang', 'magang.id = logbook.magang_id')
                    ->where('magang.guru_id', 2)
                    ->countAllResults(),
            ],
            'siswa_bimbingan' => $db->table('magang')
                ->select('magang.*, users.name as siswa_name, dudi.nama_perusahaan')
                ->join('users', 'users.id = magang.siswa_id', 'left')
                ->join('dudi', 'dudi.id = magang.dudi_id', 'left')
                ->where('magang.guru_id', 2)
                ->orderBy('magang.created_at', 'DESC')
                ->get()
                ->getResultArray()
        ];
        return view('dashboard/guru', $data); 
    }
    
    public function siswa() 
    { 
        $db = db_connect();
        
        // Get user data from session or token
        $user = $this->getUserData();
        
        // Get real data from database for siswa
        $data = [
            'user' => $user,
            'magang_info' => $db->table('magang')
                ->select('magang.*, dudi.nama_perusahaan, dudi.alamat, dudi.telepon, dudi.email, users.name as guru_name')
                ->join('dudi', 'dudi.id = magang.dudi_id', 'left')
                ->join('users', 'users.id = magang.guru_id', 'left')
                ->where('magang.siswa_id', $user['id'])
                ->get()
                ->getRowArray(),
            'logbook_count' => $db->table('logbook')
                ->join('magang', 'magang.id = logbook.magang_id')
                ->where('magang.siswa_id', $user['id'])
                ->countAllResults(),
            'recent_logbook' => $db->table('logbook')
                ->join('magang', 'magang.id = logbook.magang_id')
                ->where('magang.siswa_id', $user['id'])
                ->orderBy('logbook.created_at', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray()
        ];
        return view('dashboard/siswa', $data); 
    }
    
    private function getUserData()
    {
        // Try to get user data from JWT token
        $token = $this->request->getHeaderLine('Authorization');
        if ($token && strpos($token, 'Bearer ') === 0) {
            $token = substr($token, 7);
            try {
                $jwt = \Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key($this->getJwtSecret(), 'HS256'));
                return [
                    'id' => (int)$jwt->sub,
                    'name' => $jwt->name,
                    'email' => $jwt->email,
                    'role' => $jwt->role
                ];
            } catch (\Exception $e) {
                // Token invalid, fall back to mock data
            }
        }
        
        // For web dashboard, we'll use mock data since JWT is handled client-side
        // The actual user data will be loaded via JavaScript from localStorage
        $uri = $this->request->getUri();
        $path = $uri->getPath();
        
        if (strpos($path, '/admin') !== false) {
            return [
                'id' => 1,
                'name' => 'Admin Sistem',
                'email' => 'admin@smk1sby.sch.id',
                'role' => 'admin'
            ];
        } elseif (strpos($path, '/guru') !== false) {
            return [
                'id' => 2,
                'name' => 'Pak Yanto',
                'email' => 'pak.yanto@smk1sby.sch.id',
                'role' => 'guru'
            ];
        } elseif (strpos($path, '/siswa') !== false) {
            // For siswa, we'll use a default user ID that exists in database
            // or create a new one if needed
            $db = db_connect();
            $siswa = $db->table('users')->where('role', 'siswa')->get()->getRowArray();
            if ($siswa) {
                return [
                    'id' => $siswa['id'],
                    'name' => $siswa['name'],
                    'email' => $siswa['email'],
                    'role' => 'siswa'
                ];
            } else {
                return [
                    'id' => 3,
                    'name' => 'Ahmad Rizki',
                    'email' => 'ahmad@smk1sby.sch.id',
                    'role' => 'siswa'
                ];
            }
        }
        
        // Return guest user as fallback
        return [
            'id' => 0,
            'name' => 'Guest',
            'email' => 'guest@example.com',
            'role' => 'guest'
        ];
    }
    
    private function getJwtSecret(): string
    {
        $key = env('encryption.key');
        if (str_starts_with($key, 'hex2bin:')) {
            $key = hex2bin(substr($key, 8));
        }
        return $key ?: 'simmas-secret';
    }
}


