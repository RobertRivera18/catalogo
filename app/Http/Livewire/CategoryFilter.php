<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoria = [], $marca = [], $order;
    public $view = 'grid';

    protected $queryString = ['subcategoria', 'marca', 'order'];

    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca', 'order']);
    }

    public function updating($property)
    {
        // Cada vez que se actualice cualquier propiedad, se reinicia la paginación
        $this->resetPage();
    }

    public function filtrar()
    {
        // Solo reinicia la paginación al aplicar los filtros manualmente desde el form
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::filter([
            'category'     => $this->category,
            'subcategory'  => $this->subcategoria,
            'brand'        => $this->marca,
            'order'        => $this->order,
        ])->paginate(12);

        return view('livewire.category-filter', compact('products'));
    }
}
