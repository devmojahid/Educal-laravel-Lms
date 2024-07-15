<?php

namespace App\Supports\Backup\Contracts;

interface BackupContract
{
    public function backupSql();
    public function backupUploads();
    public function sendBackupLink($sendBackupLink);
}
