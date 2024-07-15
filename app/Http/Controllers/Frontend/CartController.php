<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        $cart = Cart::with("item")->where('user_id', auth()->user()->id)->get();
        $cartTotal = Cart::where('user_id', auth()->user()->id)->sum('total');
        return view('frontend.pages.cart', compact(['cart', 'cartTotal']));
    }
    public function addToCart(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        $item = null;
        if ($request->item_type == 'course') {
            $item = Course::find($request->item_id);
        } elseif ($request->item_type == 'book') {
            $item = Book::find($request->item_id);
        }


        if (!$item) {
            return redirect()->back()->with('error', 'Item not found');
        }

        // check if item already in cart then call increment method
        $cart = Cart::where('item_id', $request->item_id)->where('user_id', auth()->user()->id)->first();
        if ($cart) {
            $cart->quantity += $request->quantity ?? 1;
            $cartPrice = $cart->price;
            if ($cartPrice == "") {
                $cartPrice = 0;
            }
            $cart->update([
                'total' => $cart->quantity * $cartPrice,
            ]);
            return redirect()->route("cart")->with('success', 'Course added to cart successfully');
        }

        $request->validate([
            'item_id' => 'required|integer',
            'item_type' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        $price = 0;

        if (floatval($item->discount_price) != 0) {
            $price = $item->discount_price;
        } else {
            $price = $item->price;
        }

        $cart = Cart::updateOrCreate(
            [
                'item_id'   => $request->item_id,
                'item_type' => get_class($item),
                'user_id'   => auth()->user()->id,
            ],
            [
                'price' => $price,
                'total' => $price * $request->quantity,
                'quantity' => $request->quantity,
            ]
        );

        return redirect()->route("cart")->with('success', 'Course added to cart successfully');
    }

    public function cartClear()
    {
        session()->forget('coupon');
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }

        return redirect()->back()->with('success', 'Cart cleared successfully');
    }

    public function cartRemove($id)
    {
        $cart = Cart::where('item_id', $id)->where('user_id', auth()->user()->id)->first();
        $cart->delete();
        return redirect()->back()->with('success', 'Cart Item deleted successfully');
    }

    public function cartIncrement($id)
    {
        // cart item increment
        $cart = Cart::where('item_id', $id)->where('user_id', auth()->user()->id)->first();
        $cart->increment('quantity');
        $cartPrice = $cart->price;
        if ($cartPrice == "") {
            $cartPrice = 0;
        }
        $cart->update([
            'total' => $cart->quantity * $cartPrice,
        ]);
        return redirect()->back()->with('success', 'Quantity updated successfully');
    }

    public function cartDecrement($id)
    {
        $cart = Cart::where('item_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cart->quantity == 1) {
            $cart->delete();
            return redirect()->back()->with('success', 'Quantity updated successfully');
        }
        $cart->decrement('quantity');
        $cartPrice = $cart->price;
        if ($cartPrice == "") {
            $cartPrice = 0;
        }
        $cart->update([
            'total' => $cart->quantity * $cartPrice,
        ]);

        return redirect()->back()->with('success', 'Quantity updated successfully');
    }

    public function coupon(Request $request)
    {
        $price = $request->subtotal;
        $price = str_replace("৳", "", $price);
        $price = str_replace("€", "", $price);
        $price = str_replace("₹", "", $price);
        $price = str_replace("$", "", $price);
        $price = str_replace(",", "", $price);
        $subtotal = floatval($price);
        $total = $subtotal;
        try {
            $coupon = Coupon::where('code', $request->coupon_code)->where('status', "active")->first();
            if (!$coupon) {
                return response()->json(['error' => 'Coupon not found'], 400);
            }
            if ($coupon->expired_at < date('Y-m-d')) {
                return response()->json(['error' => 'Coupon expired'], 400);
            }

            if ($coupon->count == "unlimited") {
                if ($coupon->type == 'fixed') {
                    $total = $subtotal - $coupon->ammount;
                } elseif ($coupon->type == 'percentage') {
                    $total = $subtotal - ($subtotal * $coupon->ammount / 100);
                }
                session()->put('coupon', [
                    'name' => $coupon->code,
                    'discount' => $coupon->ammount,
                    'type' => $coupon->type,
                    'total' => $total,
                ]);
                return response()->json([
                    'success' => 'Coupon applied successfully',
                    'total' => $total,
                ], 200);
            } elseif ($coupon->count < 1) {
                return response()->json(['error' => 'Coupon limit expired'], 400);
            } else {
                $coupon->decrement('count');
                if ($coupon->type == 'fixed') {
                    $total = $subtotal - $coupon->ammount;
                } elseif ($coupon->type == 'percentage') {
                    $total = $subtotal - ($subtotal * $coupon->ammount / 100);
                }
            }
            session()->put('coupon', [
                'name' => $coupon->code,
                'discount' => $coupon->ammount,
                'type' => $coupon->type,
                'total' => $total,
            ]);
            return response()->json([
                'total' => $total,
                'success' => 'Coupon applied successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'total' => $subtotal,
                'coupon' => null,
                'error' => 'Something went wrong',
            ]);
        }
    }
}
