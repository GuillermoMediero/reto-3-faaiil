<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('incidencia_id');
        });

        Schema::table('actualizaciones', function(Blueprint $table){
            $table->foreign('tecnico_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });

        Schema::table('actualizaciones', function(Blueprint $table){
            $table->foreign('incidencia_id')
            ->references('id')->on('incidencias')
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
        Schema::dropIfExists('actualizaciones');
    }
}
