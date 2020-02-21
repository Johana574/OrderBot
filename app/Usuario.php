<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //

    protected $fillable = [
        'nombre', 'direccion' , 'telefono'
    ];
    
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

}
