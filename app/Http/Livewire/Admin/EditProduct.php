<?php

namespace App\Http\Livewire\Admin;

use App\Models\Accessory;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product, $categories, $subcategories, $brands, $slug;

    public $category_id;
    public $specifications = [];
    public $newAccessories = [
        'included' => [],
        'optional'  => [],
    ];

    // Imágenes temporales subidas
    public $accessoryImages = [];


    //Reglas de validacion
    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.name' => 'required',
        'slug' => 'required|unique:products,slug',
        'product.description' => 'required',
        'product.brand_id' => 'required',
        'product.price' => 'required',
        'product.quantity' => 'numeric',
        'specifications.*.name' => 'nullable|string|max:255',
        'specifications.*.value' => 'nullable|string|max:255',
    ];

    protected $listeners = ['refreshProduct', 'delete'];


    public function mount(Product $product)
    {
        $this->product = $product;

        $this->categories = Category::all();

        $this->category_id = $product->subcategory->category->id;

        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $this->slug = $this->product->slug;
        $this->specifications = $product->specifications->map(function ($spec) {
            return [
                'id' => $spec->id,
                'name' => $spec->name,
                'value' => $spec->value,
            ];
        })->toArray();

        $this->brands = Brand::whereHas('categories', function (Builder $query) {
            $query->where('category_id', $this->category_id);
        })->get();
    }


    public function updatedProductName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();

        /* $this->reset(['subcategory_id', 'brand_id']); */
        $this->product->subcategory_id = "";
        $this->product->brand_id = "";
    }

    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->product->subcategory_id);
    }

    public function addSpecification()
    {
        $this->specifications[] = ['id' => null, 'name' => '', 'value' => ''];
    }

    public function removeSpecification($index)
    {
        // Si existe en BD → eliminar
        if (isset($this->specifications[$index]['id'])) {
            $this->product->specifications()
                ->where('id', $this->specifications[$index]['id'])
                ->delete();
        }

        unset($this->specifications[$index]);
        $this->specifications = array_values($this->specifications);
    }
    public function save()
    {
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;

        if ($this->product->subcategory_id) {
            if (!$this->subcategory->color && !$this->subcategory->size) {
                $rules['product.quantity'] = 'required|numeric';
            }
        }

        $this->validate($rules);

        $this->product->slug = $this->slug;

        $this->product->save();
        // IDs actuales en BD
        $existingIds = $this->product->specifications()->pluck('id')->toArray();

        // IDs que vienen del frontend
        $incomingIds = collect($this->specifications)
            ->pluck('id')
            ->filter()
            ->toArray();

        // 🔥 ELIMINAR los que ya no existen
        $toDelete = array_diff($existingIds, $incomingIds);

        $this->product->specifications()
            ->whereIn('id', $toDelete)
            ->delete();

        // 🔥 CREAR o ACTUALIZAR
        foreach ($this->specifications as $spec) {

            if (!empty($spec['name']) && !empty($spec['value'])) {

                if ($spec['id']) {
                    // UPDATE
                    $this->product->specifications()
                        ->where('id', $spec['id'])
                        ->update([
                            'name' => $spec['name'],
                            'value' => $spec['value'],
                        ]);
                } else {
                    // CREATE
                    $this->product->specifications()->create([
                        'name' => $spec['name'],
                        'value' => $spec['value'],
                    ]);
                }
            }
        }

        $this->emit('saved');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->product = $this->product->fresh();
    }

    public function refreshProduct()
    {
        $this->product = $this->product->fresh();
    }

    public function delete()
    {
        $images = $this->product->images;
        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }
        $this->product->delete();
        return redirect()->route('admin.index');
    }


    // Agregar fila vacía
    public function addAccessory(string $type): void
    {
        $this->newAccessories[$type][] = ['name' => '', 'image' => null];
    }

    // Eliminar fila temporal (aún no guardada)
    public function removeNewAccessory(string $type, int $index): void
    {
        unset($this->newAccessories[$type][$index]);
        unset($this->accessoryImages[$type][$index]);
        $this->newAccessories[$type] = array_values($this->newAccessories[$type]);
    }

    // Eliminar accesorio ya guardado en BD
    public function deleteAccessory(int $id): void
    {
        $accessory = Accessory::findOrFail($id);
        Storage::delete($accessory->image);
        $accessory->delete();
        $this->product = $this->product->fresh();
    }

    // Guardar accesorios nuevos
    public function saveAccessories(): void
    {
        $this->validate([
            'newAccessories.included.*.name'  => 'required|string|max:255',
            'newAccessories.optional.*.name'  => 'required|string|max:255',
            'accessoryImages.included.*'      => 'nullable|image|max:2048',
            'accessoryImages.optional.*'      => 'nullable|image|max:2048',
        ]);

        foreach (['included', 'optional'] as $type) {
            foreach ($this->newAccessories[$type] as $index => $item) {
                if (empty($item['name'])) continue;

                $path = null;

                if (!empty($this->accessoryImages[$type][$index])) {
                    $path = $this->accessoryImages[$type][$index]->store('accessories', 'public');
                }

                $this->product->accessories()->create([
                    'name'  => $item['name'],
                    'image' => $path,
                    'type'  => $type,
                ]);
            }
        }

        // Limpiar filas temporales
        $this->newAccessories = ['included' => [], 'optional' => []];
        $this->accessoryImages = [];
        $this->product = $this->product->fresh();

        $this->emit('accessoriesSaved');
    }


    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
