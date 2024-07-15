<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppInstallerController extends Controller
{
    public function index() {
        return view('install.index');
    }
}
