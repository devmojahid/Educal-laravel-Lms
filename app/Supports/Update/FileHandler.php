<?php

namespace App\Supports\Update;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class FileHandler
{
    public function uploadScript($script)
    {
        $filename = $script->getClientOriginalName();
        Storage::disk('local')->put('scripts' . $filename, file_get_contents($script));
        return 'scripts' . $filename;
    }

    public function processUnzip($filepath)
    {
        // Process the unzip
        $zip = new ZipArchive;
        $res = $zip->open(Storage::path($filepath));

        if ($res === TRUE) {
            $storagePath = storage_path('app/scripts/extracted');
            $zip->extractTo($storagePath);
            $zip->close();
            return $storagePath;
        } else {
            throw new \Exception('Failed to unzip the file');
        }
    }

    public function replaceFile($sourcePath, $destinationPath)
    {
        // Replace the file

        $sourceFiles = File::allFiles($sourcePath);

        foreach ($sourceFiles as $sourceFile) {
            $destinationFile = str_replace($sourcePath, $destinationPath, $sourceFile);
            $destinationDir = dirname($destinationFile);

            if (!File::isDirectory($destinationDir)) {
                File::makeDirectory($destinationDir, 0755, true, true);
            }

            File::copy($sourceFile, $destinationFile);
        }

        return true;
    }
}
