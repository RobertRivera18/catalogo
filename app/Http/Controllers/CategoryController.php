<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        
        $category->load('subcategories', 'brands');

        return view('categories.show', compact('category'));
    }
}
