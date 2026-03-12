<x-admin-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white">
        <form action="{{ route('admin.covers.update', $cover) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <figure class="relative mb-4">
                <div class="absolute top-4 right-4 z-10">
                    <label class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm cursor-pointer hover:bg-gray-50 transition">
                        <i class="fas fa-camera mr-2"></i>
                        Actualizar imagen
                        <input type="file" class="hidden" accept="image/*" name="image" onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>


                <div class="aspect-[3/1] bg-gray-100 rounded-lg overflow-hidden">
                    <img src="{{$cover->image}}" alt="Imagen de portada" id="imgPreview"
                        class="w-full h-full object-contain object-center transition duration-300">
                </div>
            </figure>

            <x-validation-errors class="mb-4" :errors="$errors"/> 
            <div class="mb-4">
                <x-label>
                    Titulo
                </x-label>
                <x-input name="title" value="{{ old('title',$cover->title) }}" class="w-full" type="text"
                    placeholder="Por favor ingresa el titulo" />
            </div>



            <div class="mb-4">
                <x-label>
                    Fecha de inicio
                </x-label>
                <x-input name="start_at" value="{{ old('start_at', $cover->start_at->format('Y-m-d')) }}" class="w-full"
                    type="date" />
            </div>

            <div class="mb-4">
                <x-label>
                    Fecha fin publicacion
                </x-label>
                <x-input name="end_at" value="{{ old('end_at',$cover->end_at ?$cover->end_at->format('Y-m-d'):'') }}" class="w-full" type="date" />
            </div>

            <div>
                <x-label>Estado</x-label>
                <div class="flex space-x-4 mt-2">
                    <label class="flex items-center space-x-2">
                        <x-input type="radio" name="is_active" value="1" :checked="$cover->is_active == 1" />
                        <span>Activo</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <x-input type="radio" name="is_active" value="0" :checked="$cover->is_active == 0" />
                        <span>Inactivo</span>
                    </label>
                </div>
            </div>
            <div class="flex justify-end">
                <x-button>Actualizar Portada</x-button>
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
