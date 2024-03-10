<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4  gap-4 max-w-7xl mx-auto">

            @foreach ($cursos as $curso)
                <div class="h-64 sm:px-2 lg:px-4">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-xl font-semibold text-gray-900">
                                Curso: {{ $curso->nombre }}
                            </h2>
                            <p class="text-gray-500 text-sm">
                                Clientes inscritos: {{ $curso->clientes_count }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
