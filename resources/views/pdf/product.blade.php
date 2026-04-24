<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
    h1 { font-size: 18px; margin-bottom: 5px; }
    .title { text-align: center; font-weight: bold; }
    .section { margin-top: 10px; }
    .grid { width: 100%; }
    .left { width: 40%; vertical-align: top; }
    .right { width: 60%; text-align: center; }
    .box { border: 1px solid #ddd; padding: 8px; }
    table { width: 100%; border-collapse: collapse; }
    td { border-bottom: 1px solid #eee; padding: 5px; }
    .label { color: #666; width: 50%; }
    .acc img { height: 40px; }
</style>
</head>

<body>

{{-- HEADER --}}
<div class="title">
    <h1>{{ strtoupper($product->name) }}</h1>
    <p>{{ $product->brand->name }}</p>
</div>

<table class="grid">
<tr>
    {{-- IZQUIERDA --}}
    <td class="left">
        <div class="box">
            <strong>Descripción</strong>
            <p>{!! strip_tags($product->description) !!}</p>
        </div>
    </td>

    {{-- IMAGEN --}}
    <td class="right">
        @if($product->images->first())
            <img src="{{ public_path('storage/' . $product->images->first()->url) }}"
                 style="max-height:250px;">
        @endif
    </td>
</tr>
</table>

{{-- ACCESORIOS --}}
<div class="section">
    <strong>Accesorios incluidos</strong>
    <table>
        <tr>
            @foreach($product->includedAccessories as $acc)
                <td class="acc" align="center">
                    @if($acc->image)
                        <img src="{{ public_path('storage/' . $acc->image) }}">
                    @endif
                    <div>{{ $acc->name }}</div>
                </td>
            @endforeach
        </tr>
    </table>
</div>

<div class="section">
    <strong>Accesorios opcionales</strong>
    <table>
        <tr>
            @foreach($product->optionalAccessories as $acc)
                <td class="acc" align="center">
                    @if($acc->image)
                        <img src="{{ public_path('storage/' . $acc->image) }}">
                    @endif
                    <div>{{ $acc->name }}</div>
                </td>
            @endforeach
        </tr>
    </table>
</div>

{{-- TABLA TECNICA --}}
<div class="section">
    <strong>Ficha técnica</strong>
    <table>
        @foreach($product->specifications as $spec)
            <tr>
                <td class="label">{{ $spec->name }}</td>
                <td>{{ $spec->value }}</td>
            </tr>
        @endforeach
    </table>
</div>

{{-- PRECIO --}}
<div class="section">
    <strong>Precio:</strong> ${{ number_format($product->price, 2) }}
</div>

</body>
</html>