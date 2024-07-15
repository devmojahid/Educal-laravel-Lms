<?php

namespace App\Supports\Backup;

use ZipArchive;

class BackupUploadFolderHandler
{
    public function backup()
    {
        // Backup the uploads

        $folder_path = public_path('uploads');

        if (!file_exists(storage_path('app/backups'))) {
            mkdir(storage_path('app/backups'), 0777, true);
        }

        $zipPath = 'uploades-' . date('Y-m-d-H-i-s') . '.zip';
        $zipPath = storage_path('app/backups/' . $zipPath);

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($folder_path));
            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($folder_path) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
        } else {
            throw new \Exception("Failed to create zip file");
        }

        return $zipPath;
    }
}