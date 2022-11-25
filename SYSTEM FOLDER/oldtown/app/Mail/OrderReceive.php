<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceive extends Mailable
{
    use Queueable, SerializesModels;

    public $menu_name;
    public $quantity;
    public $total;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($menu_name, $quantity, $total)
    {
        $this->menu_name = $menu_name;
        $this->quantity = $quantity;
        $this->total = number_format($total,2);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.order-receive');
    }
}