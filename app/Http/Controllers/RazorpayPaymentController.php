<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('razorpayView');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->all()
        ]);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function payment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        try {
            $order = $api->order->create(array(
                'receipt' => '123',
                'amount' => $input['amount'] * 100,
                'currency' => 'INR'
            ));
            $response = [
                'orderId' => $order['id'],
                'razorpayId' => env('RAZORPAY_KEY'),
                'amount' => $input['amount'] * 100,
                'name' => $input['name'],
                'currency' => 'INR',
                'email' => $input['email'],
                'contactNumber' => $input['contact_number'],
                'address' => $input['address'],
                'description' => 'Testing Description',
            ];
            return view('razorpay', compact('response'));
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error in payment'
            ]);
        }
    }
}
