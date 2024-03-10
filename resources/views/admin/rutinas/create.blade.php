<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Rutina') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Información de la Rutina</h3>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('rutinas.store') }}"
                        method="POST">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-rows-2 gap-6">
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input type="text"
                                            name="nombre"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Lunes</label>
                                        <textarea type="text"
                                            name="lunes"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Martes</label>
                                        <textarea type="text"
                                            name="martes"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Miercoles</label>
                                        <textarea type="text"
                                            name="miercoles"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Jueves</label>
                                        <textarea type="text"
                                            name="jueves"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Viernes</label>
                                        <textarea type="text"
                                            name="viernes"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700">Sabado</label>
                                        <textarea type="text"
                                            name="sabado"
                                            autocomplete="false"
                                            class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full
                                            shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>

                                </div>
                                <div class="px-4 py-3  text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent
                                        shadow-sm text-sm font-medium rounded-md text-white bg-red-600
                                        hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                        focus:ring-red-500">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


</x-app-layout>
