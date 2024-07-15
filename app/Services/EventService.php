<?php 
namespace App\Services;

use App\Mail\EventTicketSendMail;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Mail;

class EventService{
    public static function generateTicket($order){
        $data = [
            'order' => $order,
            'event' => $order->event_id
        ];
        $user_id = $order->user_id;
        $user = User::where('id', $user_id)->first();
        Mail::to($user->email)->send(new EventTicketSendMail($data));
    }
}