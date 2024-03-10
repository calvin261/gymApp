<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Curso') }}
        </h2>
    </x-slot>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-10">

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Información del Curso</h3>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('cursos.store') }}"
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
                                        <label for="nombre"
                                            class="block text-sm font-medium text-gray-700">Nombre del Curso</label>
                                        <input type="text"
                                            name="nombre"
                                            id="nombre"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                             shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="descripcion"
                                            class="block text-sm font-medium text-gray-700">Descripción</label>
                                        <textarea name="descripcion"
                                            id="descripcion"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                             shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>

                                    <div>
                                        <label for="horario"
                                            class="block text-sm font-medium text-gray-700">Horario</label>
                                        <div class="grid grid-cols-3 gap-y-4 gap-x-1">
                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    name="dias[]"
                                                    value="lunes">
                                                <p class="ml-4"> Lunes</p>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_inicio[]"
                                                    placeholder="Hora de inicio">
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_fin[]"
                                                    placeholder="Hora de fin">
                                            </div>

                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    name="dias[]"
                                                    value="martes">
                                                <p class="ml-4"> Martes </p>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_inicio[]"
                                                    placeholder="Hora de inicio">
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_fin[]"
                                                    placeholder="Hora de fin">
                                            </div>

                                            <!-- Repite lo mismo para el resto de días -->

                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    name="dias[]"
                                                    value="miércoles">
                                                <p class="ml-4"> Miércoles</p>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_inicio[]"
                                                    placeholder="Hora de inicio">
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_fin[]"
                                                    placeholder="Hora de fin">
                                            </div>

                                            <!-- Repite lo mismo para el resto de días -->

                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    name="dias[]"
                                                    value="jueves">
                                                <p class="ml-4"> Jueves </p>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_inicio[]"
                                                    placeholder="Hora de inicio">
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_fin[]"
                                                    placeholder="Hora de fin">
                                            </div>

                                            <!-- Repite lo mismo para el resto de días -->

                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    name="dias[]"
                                                    value="viernes">
                                                <p class="ml-4">Viernes </p>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_inicio[]"
                                                    placeholder="Hora de inicio">
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_fin[]"
                                                    placeholder="Hora de fin">
                                            </div>

                                            <!-- Repite lo mismo para el resto de días -->

                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    name="dias[]"
                                                    value="sábado">
                                                <p class="ml-4"> Sábado </p>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_inicio[]"
                                                    placeholder="Hora de inicio">
                                            </div>
                                            <div class="flex items-center">
                                                <input type="time"
                                                    name="horas_fin[]"
                                                    placeholder="Hora de fin">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="entrenador_id"
                                            class="block text-sm font-medium text-gray-700">Entrenador</label>
                                        <select name="entrenador_id"
                                            id="entrenador_id"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block
                                             w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <!-- Aquí debes incluir opciones para elegir al entrenador -->
                                            @foreach ($entrenadores as $entrenador)
                                                <option value="{{ $entrenador->id }}">{{ $entrenador->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent
                                         shadow-sm text-sm font-medium rounded-md text-white bg-red-600
                                          hover:bg-red-700 focus:outline-none focus:ring-2
                                           focus:ring-offset-2 focus:ring-red-500">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
