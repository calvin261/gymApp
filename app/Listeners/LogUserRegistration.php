<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Auditoria;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserRegistration
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
    public function handle(Registered $event): void
    {
        Auditoria::create([
            'user_id' => $event->user->id,
            'nombre' => 'Registro de Usuario',
            'descripcion' => 'Se ha registrado un nuevo usuario con el ID: ' . $event->user->id,
        ]);
    }
}
