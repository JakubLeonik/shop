<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function __invoke()
    {
        $products = Product::with('category')->latest()->limit(10)->get();
        return view('shop.index', [
            'products' => $products
        ]);
    }
}
