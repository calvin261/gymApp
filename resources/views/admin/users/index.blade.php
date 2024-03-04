<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">

        <x-table>
            @if ($users->count())
                <table aria-describedby="usuarios"
                    class="display min-w-full divide-y divide-gray-200 "
                    id="especialidad_table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre de los Usuarios
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email de los Usuarios
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha de Creacion
                            </th>


                            <th scope="col"
                                class="relative px-6 py-3">
                                <span class="sr-only">Eliminar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 ">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $user->created_at }}
                                </td>
                                <td >
                                    <form action="{{ route('usuarios.destroy', $user) }}"
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
