<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingAdminProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:profile', ['only' => ['index']]);
    }
    public function index() {
        $admin = Auth::user();
        return view('backend.setting.admin-profile',compact('admin'));
    }

    public function passwordChange(){
        return view('backend.user.user.change-password');
    }
}
