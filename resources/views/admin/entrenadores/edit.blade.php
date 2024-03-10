<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Entrenador') }}
        </h2>
    </x-slot>
    <div class="flex mt-32 flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <form method="POST"
                action="{{ route('entrenadores.update', $entrenador) }}">
                @csrf
                @method('Post')

                <div>
                    <x-label for="nombre"
                        value="{{ __('Nombre') }}" />
                    <x-input id="nombre"
                        class="block mt-1 w-full"
                        type="text"
                        name="nombre"
                        value="{{ $entrenador->nombre }}"
                        required
                        autofocus />
                </div>


                <div class="flex justify-between">

                    <div class="mt-4">
                        <x-label for="telefono"
                            value="{{ __('Telefono') }}" />
                        <x-input id="telefono"
                            class="block mt-1 w-full"
                            type="number"
                            value="{{ $entrenador->telefono }}"
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
                            <option value="Entrenamiento de fuerza"
                                @if ($entrenador->especialidad == 'Entrenamiento de fuerza') selected @endif>Entrenamiento de fuerza</option>
                            <option value="Entrenamiento cardiovascular"
                                @if ($entrenador->especialidad == 'Entrenamiento cardiovascular') selected @endif>Entrenamiento cardiovascular</option>
                            <option value="Entrenamiento resistencia"
                                @if ($entrenador->especialidad == 'Entrenamiento resistencia') selected @endif>Entrenamiento resistencia</option>
                        </select>
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ms-4">
                        {{ __('Actualizar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
