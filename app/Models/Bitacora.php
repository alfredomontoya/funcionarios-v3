<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    // protected $table = 'bitacora';

    protected $fillable = ['user_id', 'busqueda', 'hostname'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
