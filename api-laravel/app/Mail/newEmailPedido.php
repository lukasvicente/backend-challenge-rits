<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Pedido;

class newEmailPedido extends Mailable 
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
        $status = $this->pedido->status;

        $name = $this->pedido->cliente->nome;
        $email = $this->pedido->cliente->email;

        $this->subject('Atualização de pedido');
        $this->to($email,$name);

        
        return $this->markdown('mail.newEmailPedido', [
            'name' => $name,
            'id' => $id,
            'status' =>  $status ,
        ]);
    }
}
