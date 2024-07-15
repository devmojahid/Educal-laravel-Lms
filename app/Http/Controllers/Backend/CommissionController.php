<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommissionPercent;


class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:commission-setting', ['only' => ['adminCommission', 'adminCommissionUpdate']]);
    }   

    public function adminCommission()
    {
        $commission = CommissionPercent::first();
        return view('backend.commission.index',compact('commission'));
    }
    //update admin commission 
    public function adminCommissionUpdate(Request $request)
    {
        $request->validate([
            'commission' => 'required|numeric|min:0|max:100',
        ]);
        $commission = CommissionPercent::first();
        if(!$commission){
            CommissionPercent::create([
                'percent' => $request->commission,
            ]);
            return redirect()->back()->with('success', 'Admin commission updated successfully');
        }else{
            $commission->percent = $request->commission;
            $commission->save();
            return redirect()->back()->with('success', 'Admin commission updated successfully');
        }
    }
}
