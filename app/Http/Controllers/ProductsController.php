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
        $data = request() ->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'total' => 'required'
        ]);

        Product::create($data);

        return response("Added Product", 201);
    }

    public function destory(Product $product)
    {
        $product->delete();

        return response("Deleted Product", 200);
    }
}
