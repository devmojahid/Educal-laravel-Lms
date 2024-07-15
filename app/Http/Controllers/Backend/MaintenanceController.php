<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MaintenanceController extends Controller
{
    public function enableMaintenanceMode()
    {
        Artisan::call('down');
        return view('maintenance');
    }

    public function disableMaintenanceMode()
    {
        Artisan::call('up');
        return redirect()->route('home');
    }
}
