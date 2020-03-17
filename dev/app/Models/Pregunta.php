<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey = 'pregunta_id';

    public function opciones(){
        return $this->hasMany('App\Models\Opcion','pregunta_id');
    }
}
