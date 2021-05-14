<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionario';
    protected $primaryKey = 'cuestionario_id';

    protected $with = ['preguntas','preguntas.opciones'];

    public function preguntas(){
        return $this->belongsToMany('App\Models\Pregunta',
            'cuestionario_pregunta',
            'cuestionario_id',
            'pregunta_id');
    }
}
