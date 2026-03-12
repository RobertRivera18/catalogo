<x-admin-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white">
        <form action="{{ route('admin.covers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <figure class="relative mb-4">
                <div class="absolute top-4 right-4">
                    <label class="flex  items-center px-4 py-2 rounded-lg bg-white">
                        <i class="fas fa-camera mr-2"></i>
                        Actualizar imagen
                        <input type="file" class="hidden" accept="image/*" name="image"
                            onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>


                <div class="aspect-[3/1] bg-gray-100 rounded-lg overflow-hidden">
                    <img 
                        src="{{ asset('img/no-image.svg') }}" 
                        alt="Imagen de portada" 
                        id="imgPreview"
                        class="w-full h-full object-contain object-center transition duration-300"
                    >
                </div>
            </figure>
            <div class="mb-4">
                <x-label>
                    Titulo
                </x-label>
                <x-input name="title" value="{{ old('title') }}" class="w-full" type="text"
                    placeholder="Por favor ingresa el titulo" />
            </div>



            <div class="mb-4">
                <x-label>
                    Fecha de inicio
                </x-label>
                <x-input name="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}" class="w-full"
                    type="date" />
            </div>

            <div class="mb-4">
                <x-label>
                    Fecha fin publicacion
                </x-label>
                <x-input name="end_at" value="{{ old('end_at') }}" class="w-full" type="date" />
            </div>

            <div class="mb-4 flex space-x-2">
                <label>
                    <x-input type="radio" name="is_active" value="1"
                    checked
                    />
                    Activo
                </label>

                <label>
                    <x-input type="radio" name="is_active" value="0" />
                    Inactivo
                </label>
            </div>
            <div class="flex justify-end">
                <x-button>Crear Portada</x-button>
            </div>
        </form>
    </div>
    @push('js')
        <script>
            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                let input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                let imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                let file = input.files[0];

                //Creamos la url
                let objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                imgPreview.src = objectURL;

            }
        </script>
    @endpush
</x-admin-layout>
