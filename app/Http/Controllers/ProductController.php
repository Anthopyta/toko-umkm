<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('category')
            ->where('stock', '>', 0)
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }
}
