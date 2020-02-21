<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //

    protected $fillable = [
        'cantidad', 'valor'
    ];

    public function platos()
    {
        return $this->hasMany('App\Plato');
    }

    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }

    public function estados()
    {
        return $this->hasMany('App\Estado');
    }

}
