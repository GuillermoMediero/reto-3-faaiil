<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAscensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ascensors', function (Blueprint $table) {
            $table->integer('n_serie')->primary()->unsigned();
            $table->unsignedBigInteger('modelo_id');
            $table->string('direccion');
            $table->enum('zona_id',['Arriaga','Lakua','Sansomendi','Ibaiondo']);
            $table->enum('segmento',['industrial','hospital','comercial','residencial']);
            $table->boolean('sala_maquinas');
        });
        
        Schema::table('ascensors', function(Blueprint $table){
            $table->foreign('modelo_id')
            ->references('id')->on('modelos')
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
        Schema::dropIfExists('ascensors');
    }
}
