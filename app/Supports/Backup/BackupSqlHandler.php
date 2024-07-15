<?php

namespace App\Supports\Backup;

use Illuminate\Support\Facades\Log;

class BackupSqlHandler
{

    public function backup()
    {
        $fileName = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
        $path = storage_path('app/backups/' . $fileName);

        // Ensure the backups directory exists
        if (!file_exists(storage_path('app/backups'))) {
            mkdir(storage_path('app/backups'), 0777, true);
        }

        // Adjust the path to mysqldump
        $mysqldumpPath = env('MYSQLDUMP_PATH', 'mysqldump');
        $command = sprintf(
            '%s -u%s %s %s > %s 2>&1',
            $mysqldumpPath,
            escapeshellarg(env('DB_USERNAME')),
            env('DB_PASSWORD') ? '-p' . escapeshellarg(env('DB_PASSWORD')) : '',
            escapeshellarg(env('DB_DATABASE')),
            escapeshellarg($path)
        );

        Log::info('Executing mysqldump command', ['command' => $command]);

        $output = [];
        $returnVar = null;
        exec($command, $output, $returnVar);

        Log::info('mysqldump command output', ['output' => implode("\n", $output), 'return_var' => $returnVar]);

        if ($returnVar !== 0) {
            Log::error('mysqldump command failed', ['output' => implode("\n", $output), 'return_var' => $returnVar]);
            throw new \Exception('mysqldump command failed. Check logs for details.');
        }

        if (!file_exists($path)) {
            Log::error('Backup file not created', ['path' => $path]);
            throw new \Exception('Backup file not created. Check logs for details.');
        }

        return $path;
    }
}
