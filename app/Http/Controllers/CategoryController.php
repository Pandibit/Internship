<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('category',
            [
                'category' => $category
            ]);
    }

}
