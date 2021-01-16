<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

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
            'start_price' => 'required',
            'sale_price' => 'required',
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

    public function import()
    {
        Excel::import(new ProductsImport, storage_path('products.xlsx'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
