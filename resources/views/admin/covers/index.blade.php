<x-admin-layout>
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-sans text-slate-900 tracking-tight antialiased selection:bg-slate-900 selection:text-white space-y-8">
        <header
            class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/60 pb-6">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1">
                    Administración
                </p>
                <h1 class="text-3xl font-semibold text-slate-900 tracking-tight">
                    Portadas
                </h1>
            </div>

            <div>
                <a href="{{ route('admin.covers.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-full transition-all active:scale-[0.98] shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Nueva Portada</span>
                </a>
            </div>
        </header>

        {{-- LISTA DE PORTADAS REORDENABLE --}}
        <ul class="space-y-4" id="covers">
            @foreach ($covers as $cover)
                <li class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/70 overflow-hidden shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)] transition-all group"
                    data-id="{{ $cover->id }}">

                    <div class="flex flex-col lg:flex-row lg:items-center">

                        {{-- ÁREA DE VISTA PREVIA / IMAGEN CON CROP Y HANDLE DE ARRASTRE --}}
                        <div
                            class="relative w-full lg:w-72 aspect-[3/1] lg:aspect-[16/9] shrink-0 bg-slate-100 overflow-hidden">
                            <img src="{{ $cover->image }}" alt="{{ $cover->title }}"
                                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">

                            {{-- Indicador de reordenar (Drag Handle Icon) --}}
                            <div
                                class="absolute top-3 left-3 bg-slate-900/40 backdrop-blur-md p-1.5 rounded-xl text-white opacity-80 group-hover:opacity-100 transition-opacity cursor-grab active:cursor-grabbing">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 8h16M4 16h16" />
                                </svg>
                            </div>
                        </div>

                        {{-- DETALLES Y ACCIONES --}}
                        <div
                            class="p-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between flex-1 min-w-0">

                            {{-- TÍTULO Y ESTADO --}}
                            <div class="space-y-2 min-w-0">
                                <div class="flex items-center gap-3">
                                    <h2 class="text-base font-semibold text-slate-900 truncate">
                                        {{ $cover->title }}
                                    </h2>

                                    {{-- Badge de Estado Estilo Apple Pill --}}
                                    @if ($cover->is_active)
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-200/50 shrink-0">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Activo
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-medium bg-slate-100 text-slate-500 border border-slate-200/60 shrink-0">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            Inactivo
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- VIGENCIA Y FECHAS --}}
                            <div
                                class="flex items-center gap-6 text-xs text-slate-500 bg-slate-50/80 px-4 py-2.5 rounded-2xl border border-slate-100 w-fit">
                                <div>
                                    <span
                                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Inicio</span>
                                    <span
                                        class="font-semibold text-slate-700">{{ $cover->start_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="w-px h-6 bg-slate-200"></div>
                                <div>
                                    <span
                                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Finaliza</span>
                                    <span class="font-semibold text-slate-700">
                                        {{ $cover->end_at ? $cover->end_at->format('d/m/Y') : 'Sin fin' }}
                                    </span>
                                </div>
                            </div>

                            {{-- BOTÓN EDITAR --}}
                            <div class="flex justify-end pt-2 lg:pt-0">
                                <a href="{{ route('admin.covers.edit', $cover) }}"
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200/80 hover:text-slate-900 transition-all active:scale-[0.98]">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span>Editar</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.6/Sortable.min.js"></script>
        <script>
            const covers = document.getElementById('covers');

            new Sortable(covers, {
                animation: 200,
                ghostClass: 'opacity-40',
                dragClass: 'shadow-2xl',
                onEnd: function() {
                    const sorts = [];
                    covers.querySelectorAll('li').forEach((el) => {
                        sorts.push(el.dataset.id);
                    });

                    axios.post("{{ route('api.sort.covers') }}", {
                            sorts: sorts
                        })
                        .then(() => {
                            console.log("Orden guardado correctamente");
                        })
                        .catch((error) => {
                            console.error("Error al guardar el orden", error);
                        });
                }
            });
        </script>
    @endpush
</x-admin-layout>
