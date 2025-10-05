<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SettingController extends BaseController
{
    public function show()
    {
        $row = db_connect()->table('settings')->get()->getRowArray();
        return $this->response->setJSON($row ?: []);
    }

    public function update()
    {
        $data = $this->request->getJSON(true) ?: $this->request->getRawInput();
        $db = db_connect();
        $exists = $db->table('settings')->countAll() > 0;
        if ($exists) {
            $db->table('settings')->update($data);
        } else {
            $db->table('settings')->insert($data);
        }
        return $this->response->setStatusCode(ResponseInterface::HTTP_OK)->setJSON(['saved' => true]);
    }

    public function uploadLogo()
    {
        $file = $this->request->getFile('logo');
        
        if (!$file || !$file->isValid()) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'File tidak valid']);
        }

        // Validasi tipe file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Tipe file tidak didukung. Gunakan JPG, PNG, GIF, atau WebP']);
        }

        // Validasi ukuran file (max 2MB)
        if ($file->getSize() > 2 * 1024 * 1024) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['error' => 'Ukuran file terlalu besar. Maksimal 2MB']);
        }

        // Buat direktori uploads di public jika belum ada
        $uploadPath = FCPATH . 'uploads/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Generate nama file unik
        $newName = 'logo_' . time() . '.' . $file->getExtension();
        
        // Pindahkan file
        if ($file->move($uploadPath, $newName)) {
            // Simpan path logo ke database
            $logoUrl = base_url('uploads/' . $newName);
            $db = db_connect();
            $exists = $db->table('settings')->countAll() > 0;
            
            if ($exists) {
                $db->table('settings')->update(['logo_url' => $logoUrl]);
            } else {
                $db->table('settings')->insert(['logo_url' => $logoUrl]);
            }

            return $this->response->setJSON([
                'success' => true,
                'logo_url' => $logoUrl,
                'message' => 'Logo berhasil diupload'
            ]);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON(['error' => 'Gagal mengupload file']);
        }
    }
}


