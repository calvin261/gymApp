<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entrenadores') }}
        </h2>
    </x-slot>
    <div class=" mx-auto sm:px-6 lg:px-8 py-10">
        <a href="{{ route('entrenadores.create') }}">
            <x-button class="bg-green-400 mb-5 hover:bg-green-600">Crear una nuevo entrenadores</x-button>
        </a>
        <x-table>
            @if ($entrenadores->count())
                <table aria-describedby="usuarios"
                    class="display min-w-full divide-y divide-gray-200 "
                    id="especialidad_table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Especialidad
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Telefono
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Correo Electrónico
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de Incripcion
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
                        @foreach ($entrenadores as $entrenador)
                            <tr>
                                <td class="px-6 py-4 ">
                                    {{ $entrenador->nombre }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $entrenador->especialidad }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $entrenador->telefono }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $entrenador->correo }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $entrenador->created_at }}
                                </td>
                                <td>
                                    <a class="py-1 px-2 bg-blue-400 text-sm text-white rounded-full"
                                        href="{{ route('entrenadores.edit', $entrenador) }}">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('entrenadores.destroy', $entrenador) }}"
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
                    No existe ningun registro coincidente
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
            new DataTable('#especialidad_table', {

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