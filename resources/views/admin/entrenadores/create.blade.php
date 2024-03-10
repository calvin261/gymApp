<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>
        <x-validation-errors class="mb-4" />

        <form method="POST"
            action="{{ route('entrenadores.store') }}">
            @csrf
            @method('Post')

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
                        type="number"
                        :value="old('telefono')"
                        name="telefono"
                        required />
                </div>
                <div class="mt-4">
                    <x-label value="{{ __('Especialidad') }}" />
                    <select
                        class="border-gray-300 focus:border-indigo-500
                     focus:ring-indigo-500 w-56 rounded-md shadow-sm"
                        name="especialidad">
                        <option value="">Selecciona un plan</option>
                        <option value="Entrenamiento de fuerza">Entrenamiento de fuerza</option>
                        <option value="Entrenamiento cardiovascular">Entrenamiento cardiovascular</option>
                        <option value="Entrenamiento resistencia">Entrenamiento resistencia</option>
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
                <x-button class="ms-4">
                    {{ __('Crear') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
