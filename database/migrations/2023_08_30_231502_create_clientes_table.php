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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            /* $table->foreign('persona_id')->references('id')->on('persona'); */
            $table->string("referencias");
            $table->string("historial_de_compras");
            $table->string("Nivel_de_satisfaccion");
            $table->string("Comentarios_observaciones");
            $table->char('state',1)->default(1);
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
        Schema::dropIfExists('cliente');
    }
};
