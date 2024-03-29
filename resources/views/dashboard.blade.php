<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (!$salud)
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white rounded-lg shadow-md">

                        <a href="{{ route('saluds.create') }}">
                            <x-button class="m-5 bg-green-400 hover:bg-green-600">Registrar mi estado
                                fisico</x-button>
                        </a>

                    </div>
                </div>
            </div>
        @endif
        <div class="grid grid-cols-1 gap-4 mx-auto sm:grid-cols-2 max-w-7xl">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
     
        <div class="grid grid-cols-1 gap-4 mx-auto sm:grid-cols-2 max-w-7xl">
            @if ($client->cursos->isNotEmpty())
                <div class="col-span-full">
                    <h3 class="my-5 text-3xl font-semibold text-center">Cursos del Cliente</h3>
                </div>
                @foreach ($client->cursos as $curso)
                    <div class="my-5 sm:px-2 lg:px-4">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                            <div class="p-6 bg-white rounded-lg shadow-md">
                                <div class="flex items-center">
                                    <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                        <a href="https://laravel.com/docs"
                                            class="hover:text-blue-500">Curso: {{ $curso->nombre }}</a>
                                    </h2>
                                </div>
                                <div class="grid grid-cols-2 mt-4 text-sm text-gray-500 gap-x-4">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                            <path fill-rule="evenodd"
                                                d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0 .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        <p class="ml-1"> {{ $curso->descripcion }}</p>
                                    </div>
                                    <div>
                                        @php
                                            $horario = json_decode($curso->horario, true);
                                        @endphp

                                        @if ($horario)
                                            <ul>
                                                @foreach ($horario as $dia => $horas)
                                                    <li>
                                                        <strong>{{ ucfirst($dia) }}:</strong>
                                                        <ul>
                                                            <li>Hora de inicio:
                                                                {{ date('H:i', strtotime($horas['hora_inicio'])) }}</li>
                                                            <li>Hora de fin:
                                                                {{ date('H:i', strtotime($horas['hora_fin'])) }}</li>
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-red-500">Sin horario asignado</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex space-x-5">
                                    <strong>Entrenador: </strong> <p> {{$curso->entrenador->nombre }}</p>
                                </div>

                            </div>
                            <div class="flex justify-center col-span-1 sm:col-span-2">
                                <x-button class="px-3 py-2 m-5 text-white bg-gray-600 rounded-lg hover:bg-gray-800"
                                    wire:click="udpateClientCursos({{ $client }})">Cambiar de Clase</x-button>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
            @if (!$client->cursos->isNotEmpty())
                <div class="col-span-full">
                    <h3 class="my-5 text-3xl font-semibold text-center">Escoja sus Cursos</h3>
                </div>
                @foreach ($cursos as $curso)
                    <div class="h-64 my-5 sm:px-2 lg:px-4">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                            <div class="p-6 bg-white rounded-lg shadow-md">
                                <div class="flex items-center">
                                    <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                        <a href="https://laravel.com/docs"
                                            class="hover:text-blue-500">Curso: {{ $curso->nombre }}</a>
                                    </h2>
                                </div>
                                <div class="grid grid-cols-2 mt-4 text-sm text-gray-500 gap-x-4">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                            <path fill-rule="evenodd"
                                                d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0 .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        <p class="ml-1"> {{ $curso->descripcion }}</p>
                                    </div>
                                </div>
                                <button wire:click="udpateClientCursos({{ $client }},{{ $curso->id }})"
                                    class="px-3 py-2 m-5 text-white bg-blue-600 rounded-lg hover:bg-blue-800">Escoger</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if (!$client->rutina)
                <div class="col-span-full">
                    <h3 class="my-5 text-3xl font-semibold text-center">Escoja una Rutina</h3>
                </div>
                @foreach ($rutinas as $rutina)
                    <div class="h-64 sm:px-2 lg:px-4">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                            <div class="p-6 bg-white rounded-lg shadow-md">

                                <div class="flex items-center">

                                    <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                        <a href="https://laravel.com/docs"
                                            class="hover:text-blue-500">Rutinas</a>
                                    </h2>
                                </div>
                                <div class="grid grid-cols-2 mt-4 text-sm text-gray-500 gap-x-4">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                            <path fill-rule="evenodd"
                                                d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0
                                         .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        <p class="font-semibold">Nombre:</p>
                                        <p class="ml-1">{!! $rutina->Nombre !!}</p>
                                    </div>
                                </div>
                                <button wire:click="udpateClientRutina({{ $client }},{{ $rutina->id }})"
                                    class="px-3 py-2 m-5 text-white bg-blue-600 rounded-lg hover:bg-blue-800">Escoger</button>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($client->rutina)
                <div class="col-span-full">
                    <h2 class="my-2 text-5xl font-extrabold text-center dark:text-white">
                        {!! $client->rutina->Nombre !!}
                    </h2>
                    <div id="accordion-open"
                        data-accordion="open">
                        <h2 id="accordion-open-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-b-0 border-gray-200 rtl:text-right rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-1"
                                @if ($dayOfWeek != 'monday') aria-expanded="false"  @else aria-expanded="true" @endif
                                aria-controls="accordion-open-body-1">
                                <span class="flex items-center">Lunes</span>
                                <svg data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-1"
                            class="hidden"
                            aria-labelledby="accordion-open-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $client->rutina->Lunes !!}</p>

                            </div>
                        </div>
                        <h2 id="accordion-open-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-b-0 border-gray-200 rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-2"
                                @if ($dayOfWeek != 'tuesday') aria-expanded="false"  @else aria-expanded="true" @endif
                                aria-controls="accordion-open-body-2">
                                <span class="flex items-center">Martes</span>
                                <svg data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-2"
                            class="hidden"
                            aria-labelledby="accordion-open-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $client->rutina->Martes !!}</p>
                            </div>
                        </div>
                        <h2 id="accordion-open-heading-3">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-gray-200 rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-3"
                                @if ($dayOfWeek != 'wednesday') aria-expanded="false"  @else aria-expanded="true" @endif
                                aria-controls="accordion-open-body-3">
                                <span class="flex items-center"> Miercoles</span>
                                <svg data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-3"
                            class="hidden"
                            aria-labelledby="accordion-open-heading-3">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $client->rutina->Miercoles !!}</p>
                            </div>
                        </div>
                        <h2 id="accordion-open-heading-4">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-gray-200 rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-4"
                                @if ($dayOfWeek != 'thursday') aria-expanded="false"  @else aria-expanded="true" @endif
                                aria-controls="accordion-open-body-4">
                                <span class="flex items-center">Jueves</span>
                                <svg data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-4"
                            class="hidden"
                            aria-labelledby="accordion-open-heading-4">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $client->rutina->Jueves !!}</p>
                            </div>
                        </div>
                        <h2 id="accordion-open-heading-5">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-gray-200 rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-5"
                                @if ($dayOfWeek != 'friday') aria-expanded="false"  @else aria-expanded="true" @endif
                                aria-controls="accordion-open-body-5">
                                <span class="flex items-center">Viernes</span>
                                <svg data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-5"
                            class="hidden"
                            aria-labelledby="accordion-open-heading-5">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $client->rutina->Viernes !!}</p>
                            </div>
                        </div>
                        <h2 id="accordion-open-heading-6">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-gray-200 rtl:text-right focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-open-body-6"
                                @if ($dayOfWeek != 'saturday') aria-expanded="false"  @else aria-expanded="true" @endif
                                aria-controls="accordion-open-body-6">
                                <span class="flex items-center">Sabado</span>
                                <svg data-accordion-icon
                                    class="w-3 h-3 rotate-180 shrink-0"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-6"
                            class="hidden"
                            aria-labelledby="accordion-open-heading-6">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $client->rutina->Sabado !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center col-span-1 sm:col-span-2">
                    <x-button class="px-3 py-2 m-5 text-white bg-gray-600 rounded-lg hover:bg-gray-800"
                        wire:click="udpateClientRutina({{ $client }})">Cambiar de Rutina</x-button>
                </div>
            @endif
            @if ($salud)
                <div class="h-64 sm:px-2 lg:px-4">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white rounded-lg shadow-md">

                            <div class="flex items-center">

                                <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                    <a href="https://laravel.com/docs"
                                        class="hover:text-blue-500">Estado de Salud</a>
                                </h2>
                            </div>
                            <div class="grid grid-cols-2 mt-4 text-sm text-gray-500 gap-x-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                        <path fill-rule="evenodd"
                                            d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0
                                             .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <p class="font-semibold">Calorías:</p>
                                    <p class="ml-1">{{ $salud->calorias }}</p>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                        <path fill-rule="evenodd"
                                            d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0
                                                 .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a
                                                 .5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <p class="font-semibold">Altura:</p>
                                    <p class="ml-1">{{ $salud->altura }}</p>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                        <path fill-rule="evenodd"
                                            d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0
                                                 .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <p class="font-semibold">Peso:</p>
                                    <p class="ml-1">{{ $salud->peso }}</p>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                        <path fill-rule="evenodd"
                                            d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0
                                                 .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <p class="font-semibold">IMC:</p>
                                    <p class="ml-1">{{ $salud->imc }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('saluds.edit', $salud) }}">
                                        <button
                                            class="px-3 py-2 m-5 text-white bg-blue-600 rounded-lg hover:bg-blue-800">Actualizar</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
            @if ($client->plan)
                <div class="h-64 sm:px-2 lg:px-4">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="px-4 py-4">
                            <h2 class="text-lg font-semibold text-gray-800">{{ $client->plan->nombre }}</h2>
                            <p class="text-sm text-gray-600">{{ $client->plan->descripcion }}</p>
                            <div class="flex items-center mt-4 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="w-4 h-4 text-blue-500">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <p class="ml-1">{{ $client->plan->validez }}
                                    {{ $client->plan->validez === 1 ? 'mes' : 'meses' }}
                                    de validez</p>
                            </div>
                            <div class="flex items-baseline mt-2 text-gray-800">
                                <p class="text-2xl font-semibold">$ {{ $client->plan->precio }}</p>
                                <p class="ml-1 text-sm">/ mes</p>
                            </div>
                            <div class="mt-4">
                                @if (!$client->pagado)
                                    <div class="flex space-x-5">
                                        <button wire:click="$set('modalPagar', true)"
                                            class="w-full px-3 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Pagar</button>
                                        <x-button class="px-3 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-800"
                                            wire:click="udpateClientPlan({{ $client }})">Cambiar de
                                            Plan</x-button>
                                    </div>
                                @else
                                    <div class="flex space-x-5">
                                        <a href="{{ route('clients.comprobante', $client) }}">
                                            <button
                                                class="w-full px-3 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Imprimir
                                                Comprobante</button>
                                        </a>
                                        <x-button class="px-3 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-800"
                                            wire:click="udpateClientPlan({{ $client }})">Cambiar de
                                            Plan</x-button>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>


            @endif

            @if (!$client->plan)
                <div class="col-span-full">
                    <h3 class="my-5 text-3xl font-semibold text-center">Escoja un Plan</h3>
                </div>
                @foreach ($plans as $plan)
                    <div class="h-64 sm:px-2 lg:px-4">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                            <div class="p-6 bg-white rounded-lg shadow-md">

                                <div class="flex items-center">

                                    <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                        <a href="https://laravel.com/docs"
                                            class="hover:text-blue-500">Plan {{ $plan->nombre }}</a>
                                    </h2>
                                </div>
                                <div class="grid grid-cols-2 mt-4 text-sm text-gray-500 gap-x-4">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="w-4 h-4 mr-1.5 fill-current text-gray-500">
                                            <path fill-rule="evenodd"
                                                d="M6.854 3.646a.5.5 0 0 1 .708 0l5.5 5.5a.5.5 0 0 1 0
                                 .708l-5.5 5.5a.5.5 0 0 1-.708-.708L11.793 9 6.854 4.146a.5.5 0 0 1 0-.708z" />
                                        </svg>

                                        <p class="ml-1"> {{ $plan->descripcion }}</p>
                                    </div>

                                </div>

                                <button wire:click="udpateClientPlan({{ $client }},{{ $plan->id }})"
                                    class="px-3 py-2 m-5 text-white bg-blue-600 rounded-lg hover:bg-blue-800">Escoger</button>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>


    </div>


    @if ($client->plan)
        <x-dialog-modal wire:model.live="modalPagar">
            <x-slot name="title">
                Pago del Plan: {{ $client->plan->nombre }}
            </x-slot>

            <x-slot name="content">
                <div>
                    <p class="ml-1 text-sm text-gray-600">
                        {{ $client->plan->validez }} {{ $client->plan->validez === 1 ? 'mes' : 'meses' }} de
                        validez
                    </p>
                </div>


            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="udpateClientPago({{ $client }}, true)"
                    wire:loading.attr="disabled">
                    {{ __('Pagar') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif

</div>
