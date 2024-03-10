<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4 gap-4 max-w-7xl mx-auto">
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <p class="text-gray-600 text-sm">Número de Clientes:</p>
                        <p class="text-3xl font-semibold text-gray-900">{{ $numberClients }}</p>
                    </div>
                </div>
            </div>
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <p class="text-gray-600 text-sm">Número de Planes:</p>
                        <p class="text-3xl font-semibold text-gray-900">{{ $numeroPlanes }}</p>
                    </div>
                </div>
            </div>
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <p class="text-gray-600 text-sm">Número de Planes Pagados:</p>
                        <p class="text-3xl font-semibold text-gray-900">{{ $planesPagados }}</p>
                    </div>
                </div>
            </div>
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <p class="text-gray-600 text-sm">Precio Total:</p>
                        <p class="text-3xl font-semibold text-gray-900">${{ $precioTotal }}</p>
                    </div>
                </div>
            </div>
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <p class="text-gray-600 text-sm">Número de Entrenadores:</p>
                        <p class="text-3xl font-semibold text-gray-900">${{ $numberEntrenadores }}</p>
                    </div>
                </div>
            </div>
            <div class="h-64 sm:px-2 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <p class="text-gray-600 text-sm">Número de Cursos:</p>
                        <p class="text-3xl font-semibold text-gray-900">${{ $numberCursos }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
