<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = [
        'nome', 
        'email', 
        'telefone',
        'endereco',
    ];
    
    public $timestamps = true;

    public $rules = [

        'nome' => 'required|min:3|max:50',
        'email' => 'required|unique:cliente',
        'telefone' => 'required|numeric|unique:cliente',
        'endereco' => 'required',
    ];

    public function pedido(){
        return $this->hasMany(Pedido::class,'cliente_id','id');
    }
    
}