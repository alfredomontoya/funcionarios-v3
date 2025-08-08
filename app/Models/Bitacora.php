<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Bitacora extends Model
{
    use HasFactory;

    // Nombre de la tabla si no sigue la convención plural (bitacoras)
    protected $table = 'bitacora';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'busqueda',
        'hostname',
        'ip_address',
        'user_agent',
        'status',
        'results_count',
        'referer',
        'tipo',
    ];

    // Relación con el usuario (suponiendo que el modelo es User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
