<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class FileController extends BaseController
{
    public function download($filename)
    {
        // Security: Only allow alphanumeric characters, dots, underscores, and hyphens
        if (!preg_match('/^[a-zA-Z0-9._-]+$/', $filename)) {
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Invalid filename']);
        }

        // Path to the file in writable/uploads
        $filePath = WRITEPATH . 'uploads/' . $filename;
        
        // Check if file exists
        if (!file_exists($filePath)) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'File not found']);
        }

        // Get file info
        $fileInfo = pathinfo($filePath);
        $extension = strtolower($fileInfo['extension'] ?? '');
        
        // Set appropriate MIME type
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'txt' => 'text/plain'
        ];
        
        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
        
        // Set headers for download
        $this->response->setHeader('Content-Type', $mimeType);
        $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');
        $this->response->setHeader('Content-Length', filesize($filePath));
        $this->response->setHeader('Cache-Control', 'no-cache, must-revalidate');
        
        // Read and output file
        $fileContent = file_get_contents($filePath);
        
        return $this->response->setBody($fileContent);
    }
    
    public function view($filename)
    {
        // Security: Only allow alphanumeric characters, dots, underscores, and hyphens
        if (!preg_match('/^[a-zA-Z0-9._-]+$/', $filename)) {
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Invalid filename']);
        }

        // Path to the file in writable/uploads
        $filePath = WRITEPATH . 'uploads/' . $filename;
        
        // Check if file exists
        if (!file_exists($filePath)) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'File not found']);
        }

        // Get file info
        $fileInfo = pathinfo($filePath);
        $extension = strtolower($fileInfo['extension'] ?? '');
        
        // Set appropriate MIME type for viewing
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
            'txt' => 'text/plain'
        ];
        
        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
        
        // Set headers for viewing
        $this->response->setHeader('Content-Type', $mimeType);
        $this->response->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"');
        $this->response->setHeader('Content-Length', filesize($filePath));
        $this->response->setHeader('Cache-Control', 'public, max-age=3600');
        
        // Read and output file
        $fileContent = file_get_contents($filePath);
        
        return $this->response->setBody($fileContent);
    }
}