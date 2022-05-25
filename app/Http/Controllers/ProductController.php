<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // show all user products
    public function index(){
        $products = auth()->user()->products()->latest()->paginate(5);
        return view('products.index', [
            'products' => $products
        ]);
    }

    // create new product form
    public function create(){
        return view('products.create');
    }

    // store new product
    public function store(){
        $attributes  = request()->validate([
            'title' => ['required', Rule::unique('products', 'title')],
            'description' => 'required',
            'price' => ['numeric', 'required', 'min:0', 'not_in:0'],
            'quantity' => ['integer', 'required', 'min:1'],
            'category_id' => ['numeric', 'required', Rule::exists('categories', 'id')]
        ]);
        $attributes['description'] = strip_tags($attributes['description']);
        $attributes['user_id'] = auth()->user()->id;

        $product = Product::create($attributes);
        return redirect()->route('products.show', [
            'product' => $product
        ]);
    }

    // delete product
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }

    // edit product form
    public function edit(Product $product){
        return view('products.edit', [
            'product' => $product
        ]);
    }

    // update product
    public function update(Product $product){
        $attributes  = request()->validate([
            'title' => ['required', Rule::unique('products', 'title')->ignore($product->id)],
            'description' => 'required',
            'price' => ['numeric', 'required', 'min:0', 'not_in:0'],
            'quantity' => ['integer', 'required', 'min:1'],
            'category_id' => ['numeric', 'required', Rule::exists('categories', 'id')]
        ]);
        Product::find($product->id)->update($attributes);
        return redirect()->route('products.show', ['product' => $product->id]);
    }

    // show all products with filters
    public function browse()
    {
        $products_query = $this->search(request('search'), request('category'));
        $products = $products_query->with(['category'])->paginate(10);
        return view('products.browse', [
            'products' => $products
        ]);
    }

    // show one product
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
