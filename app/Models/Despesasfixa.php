<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesasfixa extends Model
{
    use HasFactory;
    protected $fillable = [
        'DataLanc',
        'Descricao',
        'Valor',
        'DataVenc',
        'tipodespesa_id'
    ];

    protected $table = 'despesasfixas';

    public function tipodespesa() {
        return $this->belongsTo(Tipodespesa::class);
    }


}
