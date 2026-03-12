<x-admin-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700 space-y-6">

        {{-- Botón Nuevo --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.covers.create') }}"
                class="inline-block px-5 py-2.5 text-sm font-semibold text-white bg-gray-800 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 transition">
                + Nuevo
            </a>
        </div>

        {{-- Lista de Portadas --}}
        <ul class="space-y-6" id="covers">
            @foreach ($covers as $cover)
                <li class="bg-white rounded-2xl shadow-md overflow-hidden cursor-move"  data-id="{{ $cover->id }}">
                    <div class="lg:flex">
                        {{-- Imagen --}}
                        <img src="{{ $cover->image }}" alt="Imagen de portada"
                            class="w-full lg:w-64 aspect-[3/1] object-cover object-center">

                        {{-- Contenido --}}
                        <div class="p-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between flex-1">

                            {{-- Título y Estado --}}
                            <div class="space-y-1">
                                <h2 class="text-lg font-semibold">{{ $cover->title }}</h2>
                                @if ($cover->is_active)
                                    <span
                                        class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-0.5 rounded">
                                        Activo
                                    </span>
                                @else
                                    <span
                                        class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-3 py-0.5 rounded">
                                        Inactivo
                                    </span>
                                @endif
                            </div>

                            {{-- Fechas --}}
                            <div class="space-y-1 text-sm">
                                <p><span class="font-bold">Inicio:</span> {{ $cover->start_at->format('d/m/Y') }}</p>
                                <p><span class="font-bold">Finaliza:</span>
                                    {{ $cover->end_at ? $cover->end_at->format('d/m/Y') : '-' }}</p>
                            </div>

                            {{-- Botón Editar --}}
                            <div>
                                <a href="{{ route('admin.covers.edit', $cover) }}"
                                    class="inline-block px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                                    Editar
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
            animation: 150,
            ghostClass: 'bg-blue-100',
            onEnd: function () {
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
