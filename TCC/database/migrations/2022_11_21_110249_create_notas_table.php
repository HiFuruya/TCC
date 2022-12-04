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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('negociante_id')->references('id')->on('negociantes');
            $table->unsignedBigInteger('user_id')->references('id')->on('user');
            $table->date('emissao');
            $table->double('valor_total')->default(0);
            $table->boolean('tipo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
