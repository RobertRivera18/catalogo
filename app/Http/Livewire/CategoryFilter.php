<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $categorySlug;          // solo el slug, no el objeto
    public $subcategoria = [];
    public $marca        = [];
    public $order        = 'new';
    public $view         = 'grid';

    protected $queryString = ['subcategoria', 'marca', 'order'];

    public function mount(Category $category)
    {
        $this->categorySlug = $category->slug;  // guardamos solo el slug
    }

    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca', 'order']);
        $this->resetPage();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function filtrar()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Reconstruimos el objeto Category desde el slug en cada render
        $category = Category::where('slug', $this->categorySlug)
            ->with('subcategories', 'brands')
            ->firstOrFail();

        $subcategorias = array_filter((array) $this->subcategoria);
        $marcas        = array_filter((array) $this->marca);

        $products = Product::with(['subcategory', 'brand', 'images', 'reviews'])
            ->where('status', Product::PUBLICADO)
            ->filter([
                'category'    => $this->categorySlug,
                'subcategory' => !empty($subcategorias) ? $subcategorias : null,
                'brand'       => !empty($marcas)        ? $marcas        : null,
                'order'       => $this->order,
            ])
            ->paginate(12);

        return view('livewire.category-filter', compact('products', 'category'));
    }
}