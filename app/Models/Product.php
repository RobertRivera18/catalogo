<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $guarded = ['id', 'created_at', 'update_at'];
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    //Accesores
    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return ColorProduct::whereHas('product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
    //Relacion de uno a muchos inversa


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //relacion muchos a muchos 

    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }

    //Relacion muchos a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    //Ruta amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // App\Models\Product.php
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['category'] ?? null, function ($query, $categorySlug) {
            $query->whereHas('subcategory.category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        });

        $query->when($filters['subcategory'] ?? null, function ($query, $subcategories) {
            $query->whereHas('subcategory', function ($q) use ($subcategories) {
                $q->whereIn('slug', (array) $subcategories);
            });
        });

        $query->when($filters['brand'] ?? null, function ($query, $brands) {
            $query->whereHas('brand', function ($q) use ($brands) {
                $q->whereIn('name', (array) $brands);
            });
        });

        $query->when($filters['order'] ?? null, function ($query, $order) {
            $query->orderBy('id', $order === 'old' ? 'asc' : 'desc');
        }, function ($query) {
            $query->orderBy('id', 'desc');
        });
    }

    //Relacion con especificaciones
    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    //Accesorios
    public function accessories()
    {
        return $this->hasMany(Accessory::class);
    }

    public function includedAccessories()
    {
        return $this->hasMany(Accessory::class)->where('type', 'included');
    }

    public function optionalAccessories()
    {
        return $this->hasMany(Accessory::class)->where('type', 'optional');
    }
}
