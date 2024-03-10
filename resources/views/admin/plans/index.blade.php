<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <a href="{{ route('plans.create') }}">
            <x-button class="bg-green-400 mb-5 hover:bg-green-600">Crear una nuevo plan</x-button>
        </a>
        <div class="flex space-x-5">
            <table aria-describedby="a"
                class="inputs">
                <th></th>
                <tbody>
                    <tr>
                        <td>Precio Minimo:</td>
                        <td><input type="text"
                                id="min"
                                name="min"></td>
                    </tr>
                    <tr>
                        <td>Precio Maximo:</td>
                        <td><input type="text"
                                id="max"
                                name="max"></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <label for="date_filter">Filtrar por fecha:</label>
                <select id="date_filter">
                    <option value="today">Hoy</option>
                    <option value="this_week">Esta semana</option>
                    <option value="this_month">Este mes</option>
                </select>
            </div>
        </div>
        <x-table>
            @if ($plans->count())
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
                                Descripcion
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Validez
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Creacion
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
                        @foreach ($plans as $plan)
                            <tr>
                                <td class="px-6 py-4 ">
                                    {{ $plan->nombre }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $plan->descripcion }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $plan->validez }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $plan->precio }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $plan->created_at }}
                                </td>
                                <td>
                                    <a class="py-1 px-2 bg-blue-400 text-sm text-white rounded-full"
                                        href="{{ route('plans.edit', $plan) }}">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('plans.destroy', $plan) }}"
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
            const minEl = document.querySelector('#min');
            const maxEl = document.querySelector('#max');

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

            // Custom range filtering function
            table.search.fixed('range', function(searchStr, data, index) {

                var min = parseInt(minEl.value, 10);
                var max = parseInt(maxEl.value, 10);
                var age = parseFloat(data[2]) || 0; // use data for the age column

                if (
                    (isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && age <= max) ||
                    (min <= age && isNaN(max)) ||
                    (min <= age && age <= max)
                ) {
                    return true;
                }

                return false;
            });

            // Changes to the inputs will trigger a redraw to update the table
            minEl.addEventListener('input', function() {
                table.draw();
            });
            maxEl.addEventListener('input', function() {
                table.draw();
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
                        // console.log(todayFormatted);
                        // const todayFormatted = today.toISOString().split('T')[0];
                        // console.log(todayFormatted);
                        table.column(4).search('^' + todayFormatted, true, false).draw();
                        break;
                    case 'this_week':
                        const firstDayOfWeekFormatted = firstDayOfWeek.toISOString().split('T')[0];
                        console.log(todayFormatted);
                        table.column(4).search('>' + firstDayOfWeekFormatted, true, false).draw();
                        break;
                    case 'this_month':
                        const firstDayOfMonthFormatted = firstDayOfMonth.toISOString().split('T')[0];
                        table.column(4).search('>' + firstDayOfMonthFormatted, true, false).draw();
                        break;
                }
            });

        })
    </script>
</x-app-layout>
