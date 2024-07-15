<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:smtp-setting', ['only' => ['index', 'paymentMethodUpdate']]);
    }
    public function index()
    {
        return view('backend.payment.index');
    }

    public function paymentMethodUpdate(Request $request){
       $data =  $request->validate([
            'STRIPE_PUBLISHABLE_KEY' => 'required',
            'STRIPE_SECRET_KEY' => 'required',
        ]);
        $env = [
            'STRIPE_PUBLISHABLE_KEY' => '"' .$data['STRIPE_PUBLISHABLE_KEY']. '"',
            'STRIPE_SECRET_KEY' => '"' .$data['STRIPE_SECRET_KEY']. '"',
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
        return redirect()->back()->with('success', 'Payment method updated successfully');
    }

}
