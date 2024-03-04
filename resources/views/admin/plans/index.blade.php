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

    <!-- jQuery -->
    <script type="text/javascript"
        src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        $(document).ready(function() {

            var table = $('#especialidad_table').DataTable({
                    responsive: true,
                    autoWidth: false,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
</x-app-layout>
