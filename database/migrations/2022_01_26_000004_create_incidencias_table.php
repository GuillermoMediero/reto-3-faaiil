<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->integer('as_serie')->unsigned();
            $table->enum('prioridad',['0','1','2']);
            $table->enum('estado',['0','1','2']);
            $table->string('detalles_op');
            $table->string('detalles_tec');
            $table->unsignedBigInteger('tecnico_id');
            $table->enum('tipo',['electrica','mecanica','estetica']);
            $table->timestamps();
        });

        Schema::table('incidencias', function(Blueprint $table){
            $table->foreign('as_serie')
            ->references('n_serie')->on('ascensors')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
