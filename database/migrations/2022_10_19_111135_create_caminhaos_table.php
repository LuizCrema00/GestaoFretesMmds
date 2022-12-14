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
        Schema::create('caminhaos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', '100')->unique();
            $table->string('veiculo', '100');
            $table->double('Carga_Max', '8', '2');
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
        Schema::dropIfExists('caminhaos');
    }
};
