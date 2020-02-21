<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    //

    protected $fillable = [
        'descripcion', 'precio'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Quiz');
    }
    


}
