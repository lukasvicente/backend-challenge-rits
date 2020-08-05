<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    protected $fillable = [
        'cliente_id', 
        'status', 
    ];
    
    public $timestamps = true;
    
    public $rules = [

        'cliente_id' => 'required',
        'status' => 'required',
         
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function produto()
    {
        return $this->belongsToMany(Produto::class, 'pedido_has_produto', 'pedido_id', 'produto_id');
    }

}
