<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produtos_vendas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('planta_id')->references('id')->on('plantas');
            $table->unsignedBigInteger('user_id')->references('id')->on('user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos_venda');
    }
};
