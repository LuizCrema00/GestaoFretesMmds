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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', '100');
            $table->string('CNPJ', '100');
            $table->string('CEP', '100');
            $table->string('UF', '100');
            $table->string('Cidade', '100');
            $table->string('Logradouro', '100');
            $table->string('Numero', '100');
            $table->string('Bairro', '100');
            $table->string('Fone', '100');
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
        Schema::dropIfExists('clientes');
    }
};
