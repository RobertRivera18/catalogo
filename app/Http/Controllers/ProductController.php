<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $relacionados = Product::where('status', 2)
            ->where('id', '!=', $product->id)
            ->whereHas('subcategory.category', function ($query) use ($product) {
                $query->where('id', $product->subcategory->category->id);
            })
            ->with(['subcategory.category', 'images'])
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('products.show', compact('product', 'relacionados'));
    }
}