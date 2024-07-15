<?php

namespace App\Supports\Update\Contracts;

interface UpdateContract
{
    public function uploadScript($script);
    public function processUnzip($filepath);
    public function checkVersion($currentVersion, $newVersion);
    public function replaceFile($sourcePath, $destinationPath);
    public function runDatabaseMigrations();
    public function triggerUpdateEvent();
}
