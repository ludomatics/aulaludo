<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion', function (Blueprint $table) {
            $table->bigIncrements('opcion_id');
            $table->string('opcion');
            $table->unsignedBigInteger('pregunta_id');
            $table->timestamps();
            // Recordar agregar banderas para procesar si la opcion es una imagen.
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
        Schema::dropIfExists('opcion');
    }
}
