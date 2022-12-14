<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    use HasFactory;
    protected $fillable = [
        'DataFrete',
        'CTe',
        'ValorNF',
        'ValorFrete',
        'CidadeOrigem',
        'UFOrigem',
        'CidadeDestino',
        'UFDestino',
        'DataFim',
        'CustoOperacao',
        'cliente_id',
        'motorista_id',
        'estado_id',
        'cidade_id',
    ];

    protected $table = 'fretes';

    protected $dates = ['DataFrete' => 'd-m-y',
    'DataFim' => 'd-m-Y'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function motorista() {
        return $this->belongsTo(Motorista::class);
    }

    public function despesas() {
        return $this->hasMany(Despesa::class);
    }

    public function caminhao() {
        return $this->hasMany(Caminhao::class);
    }





}
