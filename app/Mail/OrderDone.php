<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDone extends Mailable
{
    use Queueable, SerializesModels;

    protected $order; 

    /**
     * OrderDone constructor.
     * @param $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // title 
        $title = 'Информация по заказу №' . $this->order->code;
        
        return $this->subject($title)->view('pages.orders.mail', [
            'order' => $this->order
        ]);
    }
}
