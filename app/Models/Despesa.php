<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'TipoDespesa',
        'Descricao',
        'frete_id',
        'tipodespesa_id',
    ];

    protected $table = 'despesas';

    public function frete() {
        return $this->belongsTo(Frete::class);
    }

    public function tipodespesa() {
        return $this->belongsTo(Tipodespesa::class);
    }


}
