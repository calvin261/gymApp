<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'horario',
        'entrenador_id',
    ];
    public function entrenador()
    {
        return $this->belongsTo(Entrenadore::class);
    }
    public function clientes()
    {
        return $this->belongsToMany(Client::class, 'curso_cliente', 'curso_id', 'client_id');
    }
}
