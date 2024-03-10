<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8 py-10">
        <a href="{{ route('cursos.create') }}">
            <x-button class="bg-green-400 mb-5 hover:bg-green-600">Crear un nuevo curso</x-button>
        </a>
        <x-table>
            @if ($cursos->count())
                <table aria-describedby="cursos"
                    class="min-w-full divide-y divide-gray-200"
                    id="cursos_table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Descripción
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Horario
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Entrenador
                            </th>
                            <th scope="col"
                                class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                            <th scope="col"
                                class="relative px-6 py-3">
                                <span class="sr-only">Eliminar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($cursos as $curso)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $curso->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $curso->descripcion }}
                                </td>

                                <td class="px-6 py-4">
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
                                </td>

                                <td class="px-6 py-4">
                                    @if ($curso->entrenador && $curso->entrenador->nombre)
                                        {{ $curso->entrenador->nombre }}
                                    @else
                                        <span class="text-red-500">Sin entrenador asignado</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="py-1 px-2 bg-blue-400 text-sm text-white rounded-full"
                                        href="{{ route('cursos.edit', $curso) }}">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('cursos.destroy', $curso) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="py-1 px-2 bg-red-400 text-sm text-white rounded-full"
                                            type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>
            @endif
        </x-table>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"
        type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#cursos_table', {

                language: {
                    info: '_PAGE_ de _PAGES_',
                    infoEmpty: 'Sin registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ total de registros)',
                    lengthMenu: 'Mostrando _MENU_ registros',
                    search: "Buscar: ",
                    zeroRecords: 'No hay coincidencias'
                }
            });


        })
    </script>
</x-app-layout>