<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsTotalController extends Controller
{
    public function update(Product $product)
    {
        $product->decrement('total');

        return response(200);
    }
}
