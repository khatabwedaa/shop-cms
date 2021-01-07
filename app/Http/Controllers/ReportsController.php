<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;

class ReportsController extends Controller
{
    public function index()
    {
        $totalSoldProducts = Report::all()->count();

        $totalSoldProductsToday = Report::where('created_at', '>=', Carbon::now()->subDay())->count();

        $totalPriceSoldProductsToday = Report::where('created_at', '>=', Carbon::now()->subDay())->sum('price');

        $products = Report::latest()->paginate(20);

        return view('reports.index', compact('products', 'totalSoldProducts', 'totalSoldProductsToday', 'totalPriceSoldProductsToday'));
    }
}
