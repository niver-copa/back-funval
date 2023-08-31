<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('combustible_id');
            $table->string('potencia');
            $table->string('torque_maximo');
            $table->string('ubicacion');
            $table->string('cilindros');
            $table->string('diametro_carrera');
            $table->string('cilindraje');
            $table->string('compresion');
            $table->string('alimentacion');
            $table->unsignedBigInteger('caja_id');
            $table->integer('velocidades');
            $table->string('traccion');
            $table->unsignedBigInteger('delantera_suspension_id');
            $table->unsignedBigInteger('trasera_suspension_id');
            $table->string('frenos_delanteros');
            $table->string('color');
            $table->string('anio');
            $table->unsignedBigInteger('sucursal_id');
            $table->tinyInteger('status')->default(1);
            
            $table->timestamps();
            
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->foreign('combustible_id')->references('id')->on('combustibles');
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->foreign('delantera_suspension_id')->references('id')->on('suspensiones');
            $table->foreign('trasera_suspension_id')->references('id')->on('suspensiones');
            // $table->foreign('sucursal_id')->references('id')->on('sucursales');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
};
