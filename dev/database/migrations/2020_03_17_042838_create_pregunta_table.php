<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta', function (Blueprint $table) {
            $table->bigIncrements('pregunta_id');
            $table->string('pregunta');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('respuesta_correcta_id')->nullable();
            $table->timestamps();

            $table->foreign('respuesta_correcta_id')
                ->references('opcion_id')
                ->on('opcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta');
    }
}
