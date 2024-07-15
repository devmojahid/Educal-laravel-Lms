<?php

namespace App\Http\Controllers\Backend\Pages\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('backend.pages.home.index');
    }
}
