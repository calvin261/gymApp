<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        <p>GYMSITE</p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST"
            action="{{ route('clients.store') }}">
            @csrf
            @method("PUT")

            <div>
                <x-label for="nombre"
                    value="{{ __('Nombre') }}" />
                <x-input id="nombre"
                    class="block mt-1 w-full"
                    type="text"
                    name="nombre"
                    :value="old('nombre')"
                    required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-label for="correo"
                    value="{{ __('Correo Electrónico') }}" />
                <x-input id="correo"
                    class="block mt-1 w-full"
                    type="email"
                    name="correo"
                    :value="old('correo')"
                    required />
            </div>
            <div class="flex justify-between">

                <div class="mt-4">
                    <x-label for="telefono"
                        value="{{ __('Telefono') }}" />
                    <x-input id="telefono"
                        class="block mt-1 w-full"
                        type="text"
                        name="telefono"
                        required />
                </div>
                <div class="mt-4">
                    <x-label for="fechaNacimiento"
                        value="{{ __('Fecha de Nacimiento') }}" />
                    <x-input id="fechaNacimiento"
                        class="block mt-1 w-56"
                        type="date"
                        name="fechaNacimiento"
                        required />
                </div>
            </div>

            <div class="flex justify-between">
                <div class="mt-4">
                    <x-label for="provincia"
                        value="{{ __('Provincia') }}" />
                    <x-input id="provincia"
                        class="block mt-1 w-full"
                        type="text"
                        name="provincia"
                        required />
                </div>
                <div class="mt-4">
                    <x-label for="ciudad"
                        value="{{ __('Ciudad') }}" />
                    <x-input id="ciudad"
                        class="block mt-1 w-56"
                        type="text"
                        name="ciudad"
                        required />
                </div>
            </div>

            <div class="flex justify-between">
                <div class="mt-4">
                    <x-label for="direccion"
                        value="{{ __('Direccion') }}" />
                    <x-input id="direccion"
                        class="block mt-1 w-full"
                        type="text"
                        name="direccion"
                        required />
                </div>
                <div class="mt-4">
                    <x-label for="direccion"
                        value="{{ __('Planes') }}" />
                    <select
                        class="border-gray-300 focus:border-indigo-500
                     focus:ring-indigo-500 w-56 rounded-md shadow-sm"
                        name="plan_id">
                        <option value="">Selecciona un plan</option>
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">
                                {{ $plan->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-between">

                <div class="mt-4">
                    <x-label for="password"
                        value="{{ __('Contraseña') }}" />
                    <x-input id="password"
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation"
                        value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation"
                        class="block mt-1 w-56"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password" />
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2
                 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
