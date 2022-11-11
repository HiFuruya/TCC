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
        Schema::create('plantacoes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('planta_id')->references('id')->on('plantas');
            $table->string('nome');
            $table->string('lua');
            $table->date('plantio');
            $table->integer('mudas');
            $table->integer('user_id');
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
        Schema::dropIfExists('link_plantacoes');
    }
};
