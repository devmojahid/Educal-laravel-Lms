<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function currencyChange() {
        $currency = request()->currency;
        $currency_info = \App\Models\Currency::where('code', $currency)->first();
        if ($currency_info) {
            session()->put('currency', $currency);
            session()->put('currency_info', $currency_info);
        } else {
            session()->put('currency', 'USD');
            session()->put('currency_info', \App\Models\Currency::where('code', 'USD')->first());
        }
        return redirect()->back()->with('success', 'Currency Changed Successfully');
    }
}
