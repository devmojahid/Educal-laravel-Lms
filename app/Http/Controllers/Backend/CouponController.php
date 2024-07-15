<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{      
    //coupon index
    public function index() {
        $coupons = Coupon::latest()->get();
        return view('backend.course.coupon.index',compact('coupons'));
    }
    //coupon create
    public function create() {
        return view('backend.course.coupon.create');
    }

    //coupon store
    public function store(Request $request) {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'ammount' => 'nullable|numeric',
            'description'=>"nullable|string|max:255",
            'status' => 'required',
            'count' => 'nullable|numeric',
            'expired_at' => 'required',

        ]);
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->ammount = $request->ammount;
        $coupon->description = sanitizeInput($request->description);
        $coupon->status = $request->status;
        $coupon->count = $request->count ?? "unlimited";
        $coupon->expired_at = $request->expired_at;
        $coupon->user_id = auth()->user()->id;
        $coupon->save();
        return redirect()->route('admin.coupon.index')->with('success','Coupon created successfully');
    }

    //coupon edit 
    public function edit($id) {
        $coupon = Coupon::findOrFail($id);
        return view('backend.course.coupon.edit',compact('coupon'));
    }

    //coupon update
    public function update(Request $request, $id) {
        $request->validate([
            'code' => 'required|unique:coupons,code,'.$id,
            'type' => 'required',
            'ammount' => 'nullable|numeric',
            'description'=>"nullable|string|max:255",
            'status' => 'required',
            'count' => 'nullable|numeric',
            'expired_at' => 'required',

        ]);
        $coupon = Coupon::findOrFail($id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->ammount = $request->ammount;
        $coupon->description = sanitizeInput($request->description);
        $coupon->status = $request->status;
        $coupon->count = $request->count ?? "unlimited";
        $coupon->expired_at = $request->expired_at;
        $coupon->user_id = auth()->user()->id;
        $coupon->save();
        return redirect()->route('admin.coupon.index')->with('success','Coupon updated successfully');
    }

    //coupon delete
    public function delete(Request $request) {
        Coupon::find($request->id)->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Coupon deleted successfully !!',
        ]);
    }
}
