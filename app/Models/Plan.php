<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'validez',
        'precio',
        'pagado'
    ];
    public function clients()
    {
        return $this->hasMany(Client::class,'plan_id');
    }

}
