<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>
    <div>
        <label for="date_filter">Filtrar por fecha de creacion:</label>
        <select id="date_filter">
            <option value="today">Hoy</option>
            <option value="this_week">Esta semana</option>
            <option value="this_month">Este mes</option>
        </select>
    </div>
    <div class=" mx-auto sm:px-6 lg:px-8 py-10">
       
        <x-table>
            @if ($clients->count())
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
                                Telefono
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Correo Electrónico
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de Nacimiento
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Direccion
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Provincia
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ciudad
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de Incripcion
                            </th>


                            <th scope="col"
                                class="relative px-6 py-3">
                                <span class="sr-only">Eliminar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($clients as $client)
                            <tr>
                                <td class="px-6 py-4 ">
                                    {{ $client->nombre }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->telefono }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->correo }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->fechaNacimiento }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->direccion }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->provincia }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->ciudad }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $client->created_at }}
                                </td>
                                <td>
                                    <form action="{{ route('clients.destroy', $client) }}"
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
                let today = new Date();
                today.setHours(today.getHours() - 5); // Restar 5 horas
                today = today.toISOString().split('T')[0]; // Formato ISO sin hora

                switch (filterValue) {
                    case 'today':
                        table.columns(4).search('>' + today, true, false).draw();
                        break;

                    case 'this_month':
                        const firstDayOfMonth = new Date(new Date().getFullYear(), new Date().getMonth(),
                            1);
                        const firstDayOfMonthISO = firstDayOfMonth.toISOString().split('T')[
                            0]; // Formato ISO sin hora
                        const yearAndMonth = firstDayOfMonthISO.substr(0, 7); // Año y mes
                        table.columns(4).search('^' + yearAndMonth, true, false).draw();
                        break;
                    case 'last_month':
                        const lastMonth = new Date();
                        lastMonth.setMonth(lastMonth.getMonth() - 1);
                        const firstDayOfLastMonth = new Date(lastMonth.getFullYear(), lastMonth.getMonth(),
                            1);
                        const lastDayOfLastMonth = new Date(lastMonth.getFullYear(), lastMonth.getMonth() +
                            1, 0);
                        const firstDayOfLastMonthISO = firstDayOfLastMonth.toISOString().split('T')[
                            0]; // Formato ISO sin hora
                        const lastDayOfLastMonthISO = lastDayOfLastMonth.toISOString().split('T')[
                            0]; // Formato ISO sin hora
                        console.log(`^>=${firstDayOfLastMonthISO} <=${lastDayOfLastMonthISO}`)
                        table.columns(4).search(`^>=${firstDayOfLastMonthISO} <=${lastDayOfLastMonthISO}`,
                            true, false).draw();
                        break;
                    case 'this_year':
                        const firstDayOfYear = new Date(new Date().getFullYear(), 0, 1);
                        const year = firstDayOfYear.getFullYear();
                        table.columns(4).search('^' + year, true, false).draw();
                        break;
                }
            });


        })
    </script>
</x-app-layout>
