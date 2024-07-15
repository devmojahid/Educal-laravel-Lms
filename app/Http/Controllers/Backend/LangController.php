<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function lang()
    {
        return view('lang');
    }

    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('lang_code',$request->lang);
        return redirect()->back()->with('success', 'Language Changed Successfully');
    }
}
