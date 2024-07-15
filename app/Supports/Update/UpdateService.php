<?php

namespace App\Supports\Update;

use App\Supports\Update\Contracts\UpdateContract;

class UpdateService implements UpdateContract
{
    protected $fileHandler;
    protected $databaseHandler;

    public function __construct(FileHandler $fileHandler, DatabaseHandler $databaseHandler)
    {
        $this->fileHandler = $fileHandler;
        $this->databaseHandler = $databaseHandler;
    }

    public function uploadScript($script)
    {
        return $this->fileHandler->uploadScript($script);
    }

    public function processUnzip($filepath)
    {
        return $this->fileHandler->processUnzip($filepath);
    }

    public function checkVersion($currentVersion, $newVersion)
    {
        // Check the version
    }

    public function replaceFile($sourcePath, $destinationPath)
    {
        return $this->fileHandler->replaceFile($sourcePath, $destinationPath);
    }

    public function runDatabaseMigrations()
    {
        return $this->databaseHandler->runDatabaseMigrations();
    }

    public function triggerUpdateEvent()
    {
        // Trigger the update event
    }
}
