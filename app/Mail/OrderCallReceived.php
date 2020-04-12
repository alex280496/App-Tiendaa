<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Cart;
class OrderCallReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $datoscart;
     public $datosuser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datosuser,$datoscart)
    {
        $this->datosuser = $datosuser;
        $this->datoscart=$datoscart;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order_call');
    }
}
