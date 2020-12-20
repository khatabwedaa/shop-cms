<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('name', 'LIKE', "%{$request->keyword}%")->get();

        return response()->json($products);
    }
}
