<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioPreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionario_pregunta', function (Blueprint $table) {
            $table->bigIncrements('cuestionario_pregunta_id');
            $table->unsignedBigInteger('cuestionario_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->timestamps();

            $table->foreign('cuestionario_id')
                ->references('cuestionario_id')
                ->on('cuestionario');

            $table->foreign('pregunta_id')
                ->references('pregunta_id')
                ->on('pregunta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuestionario_pregunta');
    }
}
