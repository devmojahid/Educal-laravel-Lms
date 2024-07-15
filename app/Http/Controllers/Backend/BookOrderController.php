<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class BookOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Book')
            ->latest()
            ->get();
        return view('backend.ordered-book.index', compact('books'));
    }


    public function bookOrderUpdate(Request $request)
    {
        $order = OrderItem::find($request->id);

        if ($request->status == 'complete') {
            $order->status = 'complete';
        } elseif ($request->status == 'active') {
            $order->status = 'active';
        } elseif ($request->status == 'canceled') {
            $order->status = 'canceled';
        } elseif ($request->status == 'approved') {
            $order->status = 'enrolled';
        } else {
            $order->status = 'pending';
        }
        $order->save();
        return redirect()->back()->with('message', 'Order status updated successfully');
    }

    public function bookOrderDelete(Request $request)
    {
        $order = OrderItem::find($request->id);
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Order deleted successfully !!',
        ]);
    }

    public function orderStatusChange(Request $request)
    {
        //ajax request id 
        $book = Book::find($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Order status updated successfully !!',
            'data' => [
                'book' => $book,
                'bookType' => $book->product_type,
                'bookStatus' => $book->status,
                'id' => $book->id,
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
