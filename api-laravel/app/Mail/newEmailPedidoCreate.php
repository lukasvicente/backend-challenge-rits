<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Pedido;

class newEmailPedidoCreate extends Mailable
{
    use Queueable, SerializesModels;
    private $pedido;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id = $this->pedido->id; 

        $email = env("MAIL_FROM_ADDRESS");
        $name = env("APP_NAME");

        $this->subject('Pedido Criado');
        $this->to($email,$name);

        return $this->markdown('mail.newEmailPedidoCreate',['id' => $id ]);
    }
}
