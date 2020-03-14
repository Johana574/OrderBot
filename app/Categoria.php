<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //





 protected $table = 'categorias';

    protected $fillable = [
        'descripcion'
    ];

    public function platos()
    {
        return $this->hasMany('App\Plato');
    }
    


}
