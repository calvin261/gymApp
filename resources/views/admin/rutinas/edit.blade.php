<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rutina') }}
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
                    <form action="{{ route('rutinas.update', $rutina) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text"
                                        name="nombre"
                                        value="{{ $rutina->Nombre }}"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Lunes</label>
                                    <textarea type="text"
                                        name="lunes"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $rutina->Lunes }}
                                    </textarea>
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Martes</label>
                                    <textarea type="text"
                                        name="martes"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $rutina->Martes }}
                                    </textarea>
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Miercoles</label>
                                    <textarea type="text"
                                        name="miercoles"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $rutina->Miercoles }}
                                    </textarea>
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Jueves</label>
                                    <textarea type="text"
                                        name="jueves"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $rutina->Jueves }}
                                    </textarea>
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Viernes</label>
                                    <textarea type="text"
                                        name="viernes"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $rutina->Viernes }}
                                    </textarea>
                                </div>
                                <div>
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">Sabado</label>
                                    <textarea type="text"
                                        name="sabado"
                                        autocomplete="false"
                                        class="mt-1 focus:ring-red-500 focus:border-red-500 block w-full editor
                                        shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $rutina->Sabado }}
                                    </textarea>
                                </div>

                                <div class="px-4 py-3  text-right sm:px-6">
                                   <a href="{{ route('plans.index') }}"> <button type="button"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent
                                shadow-sm text-sm font-medium rounded-md text-white bg-gray-600
                                hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                focus:ring-gray-500">
                                    Regresar
                                </button></a>
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent
                                        shadow-sm text-sm font-medium rounded-md text-white bg-blue-600
                                        hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                        focus:ring-blue-500">
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/2ko1unqj7wxnnx8e7847a5ab0606os0sl8185ebbs7a25vqb/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>
    <script>
        $('.editor').tinymce({
            height: 250,
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount', 'image'
            ],
            toolbar: 'undo redo | blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                ' link image | help',
            image_title: true,
            a11y_advanced_options: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            images_upload_base_path:'http://127.0.0.1:8000/',
            file_picker_callback: (callback, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>

</x-app-layout>
