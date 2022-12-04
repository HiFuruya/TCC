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
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nota_id')->references('id')->on('notas');
            $table->unsignedBigInteger('plantacao_id')->references('id')->on('plantacao');
            $table->unsignedBigInteger('produto_id')->references('id')->on('produtos')->nullable();
            $table->unsignedBigInteger('insumo_id')->references('id')->on('insumos')->nullable();
            $table->double('quantidade');
            $table->string('metodo');
            $table->double('valor_unitario');
            $table->double('desconto')->default(0);
            $table->double('valor_total');
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
        Schema::dropIfExists('produtos_transacaos');
    }
};
