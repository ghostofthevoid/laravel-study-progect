<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::find(1);
        dd($product->category);

        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store()
    {
        $data = request()->validate(['name' => 'string', 'price' => 'string', 'description' => '']);
        Product::create($data);
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Product $product)
    {
        $data = request()->validate(['name' => 'string', 'price' => 'string', 'description' => '']);
        $product->update($data);
        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function restore($id)
    {

        $product = Product::withTrashed()->find($id);
        $product->restore();
        return redirect()->route('product.index');
    }
}
