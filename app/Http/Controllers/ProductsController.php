<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class   ProductsController extends Controller
{
    public function showProducts()
    {
        $products = Product::all();
    }

    public function index()
    {
        return view('products',
            [
                'products' => Product::all()
            ]);
    }

    public function show(Product $product)
    {
        return view(
            'product',
            [
                'product' => $product,
                'products' => Product::all()
            ]
        );
    }
}
