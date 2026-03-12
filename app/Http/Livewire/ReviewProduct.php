<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ReviewProduct extends Component
{


    public function mount(Product $product)
    {
        $this->product_id = $product->id;
    }


    public function render()
    {
        $product = Product::find($this->product_id);
        $ratingsCount = [
            1 => $product->reviews()->where('rating', 1)->count(),
            2 => $product->reviews()->where('rating', 2)->count(),
            3 => $product->reviews()->where('rating', 3)->count(),
            4 => $product->reviews()->where('rating', 4)->count(),
            5 => $product->reviews()->where('rating', 5)->count(),
        ];
        return view('livewire.review-product',compact('product','ratingsCount'));
    }
}
