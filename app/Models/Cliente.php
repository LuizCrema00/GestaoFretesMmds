<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'CNPJ',
        'CEP',
        'UF',
        'Cidade',
        'Logradouro',
        'Numero',
        'Bairro',
        'Fone',
    ];

    protected $table = 'clientes';

    public function fretes() {
        return $this->hasMany(Frete::class);
    }
}
