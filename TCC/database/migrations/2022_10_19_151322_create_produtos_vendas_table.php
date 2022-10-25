<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produtos_venda', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('planta_id')->references('id')->on('plantas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos_venda');
    }
};
