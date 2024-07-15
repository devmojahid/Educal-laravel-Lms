<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Supports\Backup\BackupService;
use Illuminate\Http\Request;

class BackupController extends Controller
{

    public function __construct(protected BackupService $backupService)
    {
    }

    public function index()
    {
        return view('backend.backup.index');
    }

    public function backupSql()
    {
        // Backup the SQL
        $this->backupService->backupSql();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'SQL backup completed'
            ]
        );
    }

    public function backupUploads()
    {
        // Backup the uploads
        $this->backupService->backupUploads();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Uploads backup completed'
            ]
        );
    }
}
