<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'Fone',
        'CPF_CNPJ',
        'CNH',
        'Validade_CNH',
        'Tipo_Contrato',
    ];

    protected $dates = ['ValidadeCNH' => 'd-m-y'];

    protected $table = 'motoristas';

    public function fretes() {
        return $this->hasMany(Frete::class);
    }

}
