<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Commission;
use App\Models\CommissionPercent;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:order-list', ['only' => ['index']]);
        $this->middleware('permission:order-edit', ['only' => ['update']]);
        $this->middleware('permission:order-delete', ['only' => ['delete']]);
    }
    public function index()
    {
        $orders = Order::with(['user', 'course'])->orderBy('id', 'desc')->get();
        return view('backend.order.index', compact('orders'));
    }


    public function update(Request $request)
    {
        $order = Order::with("orderItems")->find($request->id);
        $orderItems = OrderItem::find($request->id);
        $order->status = $request->status;
        $percentage = CommissionPercent::first()->percent ?? 30;



        if ($request->status == 'approved') {
            foreach ($order->orderItems as $item) {
                if ($item->item_type == 'App\Models\Course') {
                    Commission::create([
                        'user_id' => Course::where('id', $item->item_id)->first()->user_id,
                        'course_id' => $item->item_id,
                        'percentage' => $percentage,
                        'amount' => $item->price - ($item->price * $percentage) / 100,
                    ]);
                    $item->status = 'enrolled';
                    $item->save();
                }
            }
        } elseif ($request->status == 'canceled') {
            Commission::where("course_id", OrderItem::where('order_id', $order->id)->first()->course_id)->delete();
            OrderItem::where('order_id', $order->id)->update(['status' => 'canceled']);
        } else {
            Commission::where("course_id", OrderItem::where('order_id', $order->id)->first()->course_id)->delete();
            OrderItem::where('order_id', $order->id)->update(['status' => 'pending']);
        }
        $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    public function delete(Request $request)
    {
        $order = Order::find($request->id);
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Order deleted successfully !!',
        ]);
    }

    public function show($id)
    {
        // order item details 
        $order = Order::with(['user', 'course'])->where('id', $id)->first();
        $orderItems = OrderItem::with('item')->where('order_id', $id)->get();
        return view('backend.order.show', compact('order', 'orderItems'));
    }
}
