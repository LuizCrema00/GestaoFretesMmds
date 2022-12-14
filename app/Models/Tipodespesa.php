<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipodespesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'TipoDespesa',
    ];

    protected $table = 'tipodespesas';

    public function despesa() {
        return $this->hasMany(Despesa::class);
    }

    public function despesasfixa() {
        return $this->hasMany(Despesasfixa::class);
    }
}
