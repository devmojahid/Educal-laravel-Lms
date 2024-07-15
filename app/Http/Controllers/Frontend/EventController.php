<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\TicketOrder;
use App\Services\EventService;

class EventController extends Controller
{
    //event details page
    public function eventDetails($id)
    {
        $event = Event::where('id', $id)->first();
        return view("frontend.pages.event-details", compact('event'));
    }

    //eventTicket buy with stripe payment
    public function eventTicket(Request $request)
    {
        $event = Event::where('id', $request->event_id)->first();
        $user = auth()->user();
        if($event->ticket_discount_price){
            $price = $event->ticket_discount_price;
        }else{
            $price = $event->ticket_price;
        }

        try{
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'unit_amount' => $price * 100, 
                            'product_data' => [
                                'name' => 'Event Ticket',
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('event.ticket.success', ['event_id' => $event->id, 'user_id' => $user->id,'price' => $price]),
                'cancel_url' => route('checkout.cancel'),
            ]);
            

        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }





        return redirect($session->url);
    }

    //event ticket success
    public function eventTicketSuccess(Request $request)
    {
        $order = new TicketOrder();
        $order->order_number = uniqid('TICKET');
        $order->user_id = $request->user_id;
        $order->event_id = $request->event_id;
        $order->status = "approved";
        $order->total = $request->price;
        $order->save();
        // Generate the ticket
        EventService::generateTicket($order);

        $event = Event::where('id', $request->event_id)->first();
        $user = auth()->user();
        $order = TicketOrder::where('user_id', $user->id)->where('event_id', $event->id)->first();
        return view('frontend.pages.event-ticket-success', compact(['event', 'user', 'order']));
    }
}
