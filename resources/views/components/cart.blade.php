@props(['size' => 35, 'color' => 'white'])

@php
    $col = match ($color) {
        'gray' => '#374151',
        'white' => '#ffffff',
        default => '#374151',
    };
@endphp

<svg 
    width="{{ $size }}" 
    height="{{ $size }}" 
    viewBox="0 0 24 24" 
    fill="none" 
    stroke="{{ $col }}" 
    stroke-width="2" 
    stroke-linecap="round" 
    stroke-linejoin="round"
>
    <!-- Estructura del carrito -->
    <circle cx="8" cy="21" r="1"></circle>
    <circle cx="19" cy="21" r="1"></circle>
    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
</svg>