<?php

namespace App\Http\Controllers;

use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as JetstreamLoginController;

class CustomLoginController extends JetstreamLoginController
{
    public function authenticated(Request $request, $user)
    {
        event(new UserLoggedIn($user));

        return redirect()->intended(config('fortify.home'));
    }
    public function createCustom(Request $request)
    {
        $user = $this->createUser($request->all());

        // Emitir evento de registro de usuario
        Event::dispatch(new UserRegistered($user));

        // Resto del código del método create
    }
}
