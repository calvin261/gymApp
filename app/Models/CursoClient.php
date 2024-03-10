<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoClient extends Model
{
    use HasFactory;
    protected $table = 'curso_cliente';

    protected $fillable = [
        'curso_id',
        'client_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Client::class);
    }
}
