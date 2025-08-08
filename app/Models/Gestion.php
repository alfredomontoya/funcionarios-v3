<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    /** @use HasFactory<\Database\Factories\GestionFactory> */

    use HasFactory;

    protected $table = 'gestion';

    public function funcionarios () {
        return $this->hasMany(Funcionario::class);
    }
}
