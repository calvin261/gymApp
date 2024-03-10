<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salud extends Model
{
    use HasFactory;
    protected $fillable = [
        'genero',
        'calorias',
        'altura',
        'peso',
        'imc',
        'observaciones',
        'client_id',
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
