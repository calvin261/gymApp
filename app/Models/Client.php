<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'direccion',
        'provincia',
        'ciudad',
        'fechaNacimiento',
        'plan_id',
        'rutina_id',
        'user_id',

    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    public function rutina()
    {
        return $this->belongsTo(Rutina::class, 'rutina_id');
    }
    public function Salud()
    {
        return $this->hasOne(Salud::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_cliente', 'client_id', 'curso_id');
    }
}
