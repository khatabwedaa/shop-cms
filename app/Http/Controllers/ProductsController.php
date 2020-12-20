<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('index', compact('products'));
    }

    public function store()
    {
        Product::create(request(['name', 'price', 'total']));

        return response(201);
    }
}
