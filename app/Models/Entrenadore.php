<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenadore extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'especialidad',
        'user_id',
    ];
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'entrenador_id');
    }
}
