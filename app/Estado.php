<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable = [
        'descripcion'
    ];
    
    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }


}
