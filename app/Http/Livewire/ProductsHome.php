<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsHome extends Component
{
    use WithPagination;

    public $categories;
    public $category = null;
    public $subcategoria = [];
    public $marca = [];
    public $order;
    public $view = 'list';
    public $showFilters = false; 
    public $categorySelected = '';

    public function updatedCategory($value)
    {
        $this->categorySelected = $value;
    }

    protected $queryString = ['category', 'subcategoria', 'marca', 'order', 'view'];

    public function mount()
    {
        $this->categories = Category::with('subcategories')->get();
    }

    public function limpiar()
    {
        $this->reset(['category', 'subcategoria', 'marca', 'order']);
    }

    public function updating($property)
    {
        $this->resetPage();
    }

    public function filtrar()
    {
        $this->resetPage();
    }

    public function updatedView()
    {
        // cada vez que cambia la vista (grid/list), no perder la página actual
        $this->resetPage();
    }

    public function render()
    {
        $filters = [
            'category' => $this->category,
            'subcategory' => $this->subcategoria,
            'brand' => $this->marca,
            'order' => $this->order,
        ];

        $products = Product::with(['subcategory.category', 'brand', 'images', 'reviews'])
            ->filter($filters)
            ->paginate(15);

        return view('livewire.products-home', [
            'products' => $products,
        ]);
    }
}
