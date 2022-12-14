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
        Schema::create('despesasfixas', function (Blueprint $table) {
            $table->id();
            $table->date('DataLanc');
            $table->foreignId('tipodespesa_id')->constrained()->onDelete('cascade');
            $table->string('Descricao', '100');
            $table->Decimal('Valor', '12', '2');
            $table->date('DataVenc');
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
        Schema::dropIfExists('despesasfixas');
    }
};
