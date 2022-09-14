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
        Schema::create('link_plantacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->references('id')->on('user');
            $table->unsignedBigInteger('plantacoes_id')->references('id')->on('plantacoes');
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
        Schema::dropIfExists('link_plantacoes');
    }
};
