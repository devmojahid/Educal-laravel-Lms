<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SiteSettingsController extends Controller
{
    public function siteSettingsMethodUpdate(Request $request){
        $data = $request->validate([
            "APP_NAME" => 'nullable | regex:/^[^\'"]*$/',
            "APP_DEBUG" => 'nullable',
        ],
        [
            "APP_NAME.regex" => "The site name field may only contain letters, numbers, and dashes.",
        ]);

        $env = [
            "APP_NAME" => '"' .$data['APP_NAME']. '"',
            "APP_DEBUG" => $data['APP_DEBUG'],
        ];
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($env) > 0) {
            foreach ($env as $envKey => $envValue) {
                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }
        }
        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
        Artisan::call('config:clear');
        return redirect()->back()->with('success', 'Site settings updated successfully');
    }
}
