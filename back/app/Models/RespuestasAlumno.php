<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestasAlumno extends Model
{
    protected $table = 'respuestas_alumno';
    protected $primaryKey = 'respuestas_alumno_id';
    protected $fillable = ['cuestionario_id','alumno_id','pregunta_id','opcion_id'];
}
