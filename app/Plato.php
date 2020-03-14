<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    //

    protected $fillable = [
        'categoria_id', 'descripcion', 'precio', 'id'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

}
