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
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('codigo');
            $table->string('calle');
            $table->string('num_exterior')->nullable();
            $table->string('num_interior')->nullable();
            $table->string('localidad');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('cod_postal');
            $table->string('referencia');
            $table->string('municipio');
            $table->string('pais');
            $table->boolean('estado');
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
        Schema::dropIfExists('sucursales');
    }
};