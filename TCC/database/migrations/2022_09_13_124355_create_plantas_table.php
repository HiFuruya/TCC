<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantacoes');
    }
};
