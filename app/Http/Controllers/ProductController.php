<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function browse()
    {
        $products_query = $this->search(request('search'), request('category'));
        $products = $products_query->with(['category'])->paginate(10);
        return view('products.browse', [
            'products' => $products
        ]);
    }
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    //search for product
    public function search($key, $category){
        return Product::latest()
            ->when($key ?? false && $key !== '', function($query) use($key){
                $query->where(function ($query) use($key){
                    $query->where('title', 'like', '%'.$key.'%')
                        ->orWhere('description', 'like', '%'.$key.'%');
                });
            })
            ->when(($category ?? false ? true : false) && (strcmp($category, "all") != 0) , function($query) use($category){
                $query->where('category_id', 'like', $category);
            });
    }
}
