<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class=" mx-auto sm:px-6 lg:px-8 py-10">
        <a href="{{ route('rutinas.create') }}">
            <x-button class="bg-green-400 mb-5 hover:bg-green-600">Crear una nuevo rutina</x-button>
        </a>
        <div>
            <label for="date_filter">Filtrar por fecha de creacion:</label>
            <select id="date_filter">
                <option value="today">Hoy</option>
                <option value="this_week">Esta semana</option>
                <option value="this_month">Este mes</option>
            </select>
        </div>
        <x-table>
            @if ($rutinas->count())
                <table aria-describedby="usuarios"
                    class="display  min-w-full divide-y divide-gray-200 "
                    id="especialidad_table">
                    <thead class="bg-gray-50 ">
                        <tr class="">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lunes
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Martes
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Miercoles
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jueves
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Viernes
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sabado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de Creacion
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
                        @foreach ($rutinas as $rutina)
                            <tr>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Nombre !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Lunes !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Martes !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Miercoles !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Jueves !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Viernes !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->Sabado !!}
                                </td>
                                <td class="px-6 py-4 ">
                                    {!! $rutina->created_at !!}
                                </td>
                                <td>
                                    <a class="py-1 px-2 bg-blue-400 text-sm text-white rounded-full"
                                        href="{{ route('rutinas.edit', $rutina) }}">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('rutinas.destroy', $rutina) }}"
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

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"
        type="text/javascript"></script>
    <script>
        $(document).ready(function() {


            const table = new DataTable('#especialidad_table', {

                language: {
                    info: '_PAGE_ de _PAGES_',
                    infoEmpty: 'Sin registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ total de registros)',
                    lengthMenu: 'Mostrando _MENU_ registros',
                    search: "Buscar: ",
                    zeroRecords: 'No hay coincidencias'
                }
            });

            $('#date_filter').on('change', function() {
                const filterValue = $(this).val();
                const today = new Date();
                const firstDayOfWeek = new Date(today.setDate(today.getDate() - today.getDay()));
                const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);

                switch (filterValue) {
                    case 'today':
                        console.log(today);
                        const todayFormatted = "2024-03-09"
                        console.log(todayFormatted);
                        // const todayFormatted = today.toISOString().split('T')[0];
                        // console.log(todayFormatted);
                        table.column(7).search('^' + todayFormatted, true, false).draw();
                        break;
                    case 'this_week':
                        const firstDayOfWeekFormatted = firstDayOfWeek.toISOString().split('T')[0];
                        console.log(todayFormatted);
                        table.column(7).search('>' + firstDayOfWeekFormatted, true, false).draw();
                        break;
                    case 'this_month':
                        const firstDayOfMonthFormatted = firstDayOfMonth.toISOString().split('T')[0];
                        table.column(7).search('>' + firstDayOfMonthFormatted, true, false).draw();
                        break;
                }
            });

        })
    </script>
</x-app-layout>
