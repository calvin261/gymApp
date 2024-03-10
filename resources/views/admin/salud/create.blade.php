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
                    <form action="{{ route('saluds.store') }}"
                        method="POST">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4
                                                  py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">¡Error!</strong>
                                        <span class="block sm:inline">Hay errores en el formulario:</span>
                                        <ul class="list-disc ml-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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
                                                autocomplete="false"
                                                class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                                shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                                                step="any"
                                                id="imc"
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
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>


                                </div>
                                <div class="px-4 py-3  text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent
                                        shadow-sm text-sm font-medium rounded-md text-white bg-red-600
                                        hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                        focus:ring-red-500">
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
