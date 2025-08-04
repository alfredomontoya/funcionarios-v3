<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
    use HasFactory, Notifiable;
    //
    protected $fillable = ['ci', 'nombres', 'apellidos', 'cargo', 'encargado', 'telefonoencargado'];

}
