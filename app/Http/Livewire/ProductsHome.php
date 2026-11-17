<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;

class ProductsHome extends Component
{
    public $category = '';
    public $subcategoria = [];
    public $marca = [];
    public $order = '';
    public $view = 'grid';

    public int $perPage = 12;
    public int $step = 12;

    protected $queryString = [
        'category' => ['except' => ''],
        'subcategoria' => ['except' => []],
        'marca' => ['except' => []],
        'order' => ['except' => ''],
        'view' => ['except' => 'grid'],
    ];

    public function updated($propertyName)
    {
        // "marca.0" -> "marca"
        if (in_array(Str::before($propertyName, '.'), ['category', 'subcategoria', 'marca', 'order'])) {
            $this->perPage = $this->step;
        }
    }

    public function loadMore()
    {
        $this->perPage += $this->step;
    }

    public function limpiar()
    {
        $this->reset(['category', 'subcategoria', 'marca', 'order']);
        $this->perPage = $this->step;
    }

    public function render()
    {
        $categories = Category::select('id', 'name', 'slug')
            ->with(['subcategories:id,category_id,name,slug'])
            ->get();

        $products = Product::query()
            ->with([
                'images' => fn ($query) => $query->select('id', 'url', 'imageable_id', 'imageable_type'),
                'brand:id,name',
                'subcategory:id,category_id,name,slug',
                'subcategory.category:id,name,slug',
            ])
            ->filter([
                'category' => $this->category,
                'subcategory' => $this->subcategoria,
                'brand' => $this->marca,
                'order' => $this->order,
            ])
            ->paginate($this->perPage);

        return view('livewire.products-home', [
            'products' => $products,
            'categories' => $categories,
            'categorySelected' => $this->category,
        ]);
    }
}