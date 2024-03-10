<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
    ];
    public function clients()
    {
        return $this->hasMany(Client::class,'plan_id');
    }
}
