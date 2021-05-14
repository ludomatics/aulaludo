<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionario_alumno', function (Blueprint $table) {
            $table->bigIncrements('cuestionario_alumno_id');
            $table->unsignedBigInteger('cuestionario_id');
            $table->unsignedBigInteger('alumno_id');
            $table->integer('aciertos');
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
        Schema::dropIfExists('cuestionario_alumno');
    }
}
