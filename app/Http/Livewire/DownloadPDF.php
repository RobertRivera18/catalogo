<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPDF extends Component
{

    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function download()
    {
        $product = $this->product->load([
            'brand',
            'images',
            'includedAccessories',
            'optionalAccessories',
            'specifications'
        ]);

        $pdf = Pdf::loadView('pdf.product', [
            'product' => $product
        ])->setPaper('a4');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'ficha-tecnica-' . $product->id . '.pdf'
        );
    }
    public function render()
    {
        return view('livewire.download-p-d-f');
    }
}
