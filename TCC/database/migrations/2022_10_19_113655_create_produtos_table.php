<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('produtos_compra', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos_compra');
    }
};
