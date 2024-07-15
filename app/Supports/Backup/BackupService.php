<?php

namespace App\Supports\Backup;

use App\Mail\BackupLinkMail;
use App\Supports\Backup\BackupUploadFolderHandler as BackupBackupUploadFolderHandler;
use App\Supports\Backup\Contracts\BackupContract;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BackupService implements BackupContract
{

    public function __construct(protected BackupSqlHandler $backupSqlHandler, protected BackupBackupUploadFolderHandler $backupUploadsHandler)
    {
    }

    public function backupSql()
    {

        try {
            $backup = $this->backupSqlHandler->backup();
            $this->storeAndSendBackupLink($backup);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
        }
    }

    public function backupUploads()
    {
        // Backup the uploads
        $backup = $this->backupUploadsHandler->backup();
        $this->storeAndSendBackupLink($backup);
    }

    protected function storeAndSendBackupLink($backupFile)
    {
        // Store the backup and send the link
        $fileName = basename($backupFile);

        if (!file_exists($backupFile)) {
            Log::error('Backup file not created', ['path' => $backupFile]);
            throw new \Exception('Backup file not created. Check logs for details.');
        }

        Storage::putFileAs('backups', new \Illuminate\Http\File($backupFile), $fileName);


        $fileUrl = Storage::url('backups/' . $fileName);
        $this->sendBackupLink($fileUrl);
    }

    public function sendBackupLink($fileUrl)
    {
        // Send the backup link
        $email = auth()->user()->email;
        $subject = 'Backup Link';
        $data = [
            'backupLink' => $fileUrl
        ];

        Mail::to($email)->send(new BackupLinkMail($subject, $data));
    }
}
