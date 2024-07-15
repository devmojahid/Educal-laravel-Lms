<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Supports\Update\UpdateService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    public function __construct(public UpdateService $updateService)
    {
    }

    public function index()
    {
        return view('backend.update.index');
    }

    public function update(Request $request)
    {

        $request->validate(
            [
                'script' => 'required|file|mimes:zip|max:9999'
            ],
            [
                'script.required' => 'Please select a script to upload',
                'script.file' => 'The uploaded file is not a valid file',
                'script.mimes' => 'The uploaded file must be a zip file',
                'script.max' => 'The uploaded file must be less than 10MB'
            ]
        );

        if ($request->hasFile('script')) {
            $script = $request->file('script');

            $filepath = $this->updateService->uploadScript($script);

            $processUnzipPath = $this->updateService->processUnzip($filepath);

            $this->updateService->replaceFile($processUnzipPath, base_path());

            $this->updateService->runDatabaseMigrations();
            $this->updateService->triggerUpdateEvent();

            return response()->json(['message' => 'Script uploaded successfully']);
        }

        return response()->json(['message' => 'Failed to upload the script'], 500);
    }
}
