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
        Schema::create('insumos_transacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transacao_id')->references('id')->on('transacao');
            $table->unsignedBigInteger('insumo_id')->references('id')->on('insumos');
            $table->unsignedBigInteger('nota_id')->references('id')->on('notas');
            $table->unsignedBigInteger('plantacao_id')->references('id')->on('plantacao');
            $table->integer('quantidade');
            $table->string('metodo');
            $table->integer('valor_unitario');
            $table->integer('valor_total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumos_transacaos');
    }
};
