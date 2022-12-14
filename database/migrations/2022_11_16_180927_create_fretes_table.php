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
        Schema::create('fretes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->foreignId('motorista_id')->constrained()->onDelete('cascade');
            $table->foreignId('caminhao_id')->nullable();
            $table->date('DataFrete');
            $table->string('CTe', '100')->unique();
            $table->Decimal('ValorNF', '12', '2');
            $table->Decimal('ValorFrete', '12', '2')->nullable();
            $table->string('CidadeOrigem', '100');
            $table->string('UFOrigem', '100');
            $table->string('CidadeDestino', '100');
            $table->string('UFDestino', '100');
            $table->date('DataFim')->nullable();
            $table->Decimal('CustoOperacao', '12', '2')->nullable();
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
        Schema::dropIfExists('fretes');
    }
};
