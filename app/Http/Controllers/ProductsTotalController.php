<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;

class ProductsTotalController extends Controller
{
    public function update(Product $product)
    {
        $product->decrement('total');

        Report::create([
            'name' => $product->name,
            'price' => $product->price
        ]);

        if ($product->total == 0) {
            $product->delete();
        }

        return response("Update Total Quantity", 200);
    }
}
