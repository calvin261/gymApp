<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4  gap-4 max-w-7xl mx-auto">
            <div class="  h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">

                        <p>Numero de Clientes:</p>
                        <p>{{ $numberClients }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
