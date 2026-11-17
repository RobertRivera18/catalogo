<x-admin-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-sans text-slate-900 tracking-tight antialiased selection:bg-slate-900 selection:text-white space-y-8">

        {{-- ENCABEZADO Y NAVEGACIÓN DE REGRESO --}}
        <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/60 pb-6">
            <div>
                <a href="{{ route('admin.covers.index') }}" 
                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-slate-900 transition-colors mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <span>Volver a portadas</span>
                </a>
                <h1 class="text-3xl font-semibold text-slate-900 tracking-tight">
                    Nueva Portada
                </h1>
            </div>
        </header>

        {{-- FORMULARIO PRINCIPAL --}}
        <form action="{{ route('admin.covers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- VISTA PREVIA DE IMAGEN Y BOTÓN (ESTRUCTURA ORIGINAL) --}}
            <section class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/70 p-6 sm:p-8 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)] space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400">Imagen de Portada</h2>
                </div>

                <figure class="relative mb-4">
                    <div class="absolute top-4 right-4 z-10">
                        <label class="flex items-center px-4 py-2 text-xs font-semibold text-slate-800 bg-white border border-slate-200 rounded-lg shadow-xs cursor-pointer hover:bg-slate-50 transition">
                            <i class="fas fa-camera mr-2"></i>
                            Actualizar imagen
                            <input type="file" class="hidden" accept="image/*" name="image" onchange="previewImage(event, '#imgPreview')">
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
            </section>

            {{-- ERRORES DE VALIDACIÓN --}}
            <x-validation-errors class="rounded-2xl" :errors="$errors"/>

            {{-- CAMPOS DEL FORMULARIO --}}
            <section class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/70 p-6 sm:p-8 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)] space-y-6">
                
                {{-- Campo Título --}}
                <div class="space-y-1.5">
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-400">
                        Título
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           placeholder="Ingresa el título de la portada"
                           class="w-full px-4 py-2.5 rounded-2xl bg-slate-50/50 border border-slate-200/80 text-sm font-medium text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-slate-900 focus:ring-0 transition-all outline-none">
                </div>

                {{-- Fechas de Publicación --}}
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label for="start_at" class="block text-xs font-bold uppercase tracking-wider text-slate-400">
                            Fecha de inicio
                        </label>
                        <input type="date" name="start_at" id="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}"
                               class="w-full px-4 py-2.5 rounded-2xl bg-slate-50/50 border border-slate-200/80 text-sm font-medium text-slate-900 focus:bg-white focus:border-slate-900 focus:ring-0 transition-all outline-none">
                    </div>

                    <div class="space-y-1.5">
                        <label for="end_at" class="block text-xs font-bold uppercase tracking-wider text-slate-400">
                            Fecha fin publicación
                        </label>
                        <input type="date" name="end_at" id="end_at" value="{{ old('end_at') }}"
                               class="w-full px-4 py-2.5 rounded-2xl bg-slate-50/50 border border-slate-200/80 text-sm font-medium text-slate-900 focus:bg-white focus:border-slate-900 focus:ring-0 transition-all outline-none">
                    </div>
                </div>

                {{-- Seleccionador de Estado --}}
                <div class="space-y-2 pt-2">
                    <span class="block text-xs font-bold uppercase tracking-wider text-slate-400">
                        Estado de publicación
                    </span>
                    
                    <div class="bg-slate-100/80 p-1 rounded-2xl border border-slate-200/50 grid grid-cols-2 gap-1 max-w-xs">
                        <label class="cursor-pointer">
                            <input type="radio" name="is_active" value="1" class="peer sr-only" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                            <div class="py-2 text-center rounded-xl text-xs font-medium text-slate-600 transition-all duration-200 peer-checked:bg-white peer-checked:text-emerald-700 peer-checked:shadow-xs peer-checked:font-semibold">
                                Activo
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="is_active" value="0" class="peer sr-only" {{ old('is_active') == '0' ? 'checked' : '' }}>
                            <div class="py-2 text-center rounded-xl text-xs font-medium text-slate-600 transition-all duration-200 peer-checked:bg-white peer-checked:text-slate-900 peer-checked:shadow-xs peer-checked:font-semibold">
                                Inactivo
                            </div>
                        </label>
                    </div>
                </div>

            </section>

            {{-- BOTONES DE ACCIÓN --}}
            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ route('admin.covers.index') }}" 
                   class="px-5 py-2.5 rounded-full text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2.5 rounded-full bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold transition-all active:scale-[0.98] shadow-xs">
                    Crear Portada
                </button>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            function previewImage(event, querySelector) {
                let input = event.target;
                let imgPreview = document.querySelector(querySelector);

                if (!input.files.length) return;

                let file = input.files[0];
                let objectURL = URL.createObjectURL(file);

                imgPreview.src = objectURL;
            }
        </script>
    @endpush
</x-admin-layout>