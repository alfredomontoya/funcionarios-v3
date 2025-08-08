<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Funcionario extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'funcionario';

    protected $fillable = ['nro', 'nroedificio', 'ci', 'nombres', 'apellidos', 'cargo', 'edificio', 'tipo', 'responsable', 'entregado', 'telresponsable', 'estado', 'gestion_id'];

    public function gestion () {
        return $this->belongsTo(Gestion::class);
    }
    

}
