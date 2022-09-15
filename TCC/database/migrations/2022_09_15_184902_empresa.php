<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->string('nome');
            $table->string('doc')->unique();
            $table->integer('relacao_id')->unsigned(); 
            $table->string('relacao_type', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
};
