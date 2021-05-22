<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function alert(Order $order)
    {
        // E-mail 
        $email = $order->customer->email;

        // customer hasn't email 
        if (is_null($email)) {
            session()->flash('warning', 'Что-то пошло не так');
        }
        // customer has email 
        else { 
            Mail::to($email)->send(new OrderDone($order));
            session()->flash('success', 'Уведомление отправлено');
        }

        return redirect()->route('orders.index');
    }
}
