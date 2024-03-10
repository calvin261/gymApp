<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\Auditoria;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        // Registra la acción en la tabla de auditoría
        Auditoria::create([
            'user_id' => $event->user->id,
            'nombre' => 'Inicio de Sesión',
            'descripcion' => 'El usuario ' . $event->user->name . ' ha iniciado sesión en la aplicación.',
        ]);
    }
}
