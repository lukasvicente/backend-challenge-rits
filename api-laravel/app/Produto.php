<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'nome', 
        'preco', 
    ];
    
    public $timestamps = true;

    public $rules = [

        'nome' => 'required|min:3|max:50',
        'preco' => 'required|numeric',
    ];
}
