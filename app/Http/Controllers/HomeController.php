<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('index', compact('products'));
    }
}
