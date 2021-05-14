<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_alumno', function (Blueprint $table) {
            $table->bigIncrements('respuestas_alumno_id');
            $table->unsignedBigInteger('cuestionario_id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('opcion_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_alumno');
    }
}
