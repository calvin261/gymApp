<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estado de Salud') }}
        </h2>
    </x-slot>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-10">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Información de mi Estado de Salud</h3>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('saluds.update', $salud) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-rows-2 gap-6">
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Genero</label>
                                        <select name="genero"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                    shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <option value="masculino">Masculino</option>
                                            <option value="femenino">Femenino</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>
                                            <label for="first_name"
                                                class="block text-sm font-medium text-gray-700">Altura (cm)</label>
                                            <input type="number"
                                                name="altura"
                                                placeholder="0.00"
                                                id="altura"
                                                value="{{ $salud->altura }}"
                                                autocomplete="false"
                                                class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                                shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div>
                                            <x-label for="direccion"
                                                value="{{ __('Clientes') }}" />
                                            <select
                                                class="border-gray-300 focus:border-indigo-500
                                             focus:ring-indigo-500 w-56 rounded-md shadow-sm"
                                                name="client_id">
                                                <option value="">Selecciona un cliente</option>
                                                @foreach ($clientes as $cliente)
                                                    <option value="{{ $cliente->id }}"
                                                        {{ $cliente->id == $salud->client_id ? 'selected' : '' }}>
                                                        {{ $cliente->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>
                                            <label for="first_name"
                                                class="block text-sm font-medium text-gray-700">Peso (Kg)</label>
                                            <input type="number"
                                                name="peso"
                                                placeholder="0.00"
                                                id="peso"
                                                value="{{ $salud->peso }}"
                                                autocomplete="false"
                                                class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                                shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div>
                                            <label for="first_name"
                                                class="block text-sm font-medium text-gray-700">IMC</label>
                                            <input type="number"
                                                name="imc"
                                                placeholder="0.00"
                                                id="imc"
                                                step="any"
                                                value="{{ $salud->imc }}"
                                                autocomplete="false"
                                                class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                                shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Observaciones:</label>
                                        <textarea type="text"
                                            name="observaciones"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300
                                            rounded-md">{{ $salud->observaciones }}</textarea>
                                    </div>


                                </div>
                                <div class="px-4 py-3  text-right sm:px-6">
                                    <a href="{{ route('saluds.index') }}"> <button type="button"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent
                                shadow-sm text-sm font-medium rounded-md text-white bg-gray-600
                                hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                focus:ring-gray-500">
                                            Regresar
                                        </button></a>
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent
                                        shadow-sm text-sm font-medium rounded-md text-white bg-blue-600
                                        hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                        focus:ring-blue-500">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#altura, #peso').keyup(function() {
                var altura_cm = parseFloat($('#altura').val());
                var peso = parseFloat($('#peso').val());

                if (!isNaN(altura_cm) && !isNaN(peso) && altura_cm > 0 && peso > 0) {
                    var altura_m = altura_cm / 100; // Convertir altura a metros
                    var imc = peso / (altura_m * altura_m);
                    $('#imc').val(imc.toFixed(2));
                } else {
                    $('#imc').val('');
                }
            });
        });
    </script>

</x-app-layout>
