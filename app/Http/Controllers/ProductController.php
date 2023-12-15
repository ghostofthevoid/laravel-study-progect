<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $colors = Color::all();
        $categories = Category::all();
        return view('product.create', compact('categories', 'colors'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'string',
            'price' => 'string',
            'description' => '',
            'category_id' => '',
            'colors' => ''
        ]);
        $colors = $data['colors'];
        unset($data['colors']);

        $product =  Product::create($data);

        foreach ($colors as $color) {
            ColorProduct::firstOrCreate([
                'color_id' => $color,
                'product_id' => $product->id,
            ]);
        }
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('product.edit', compact('product', 'categories', 'colors'));
    }

    public function update(Product $product)
    {
        $data = request()->validate([
            'name' => 'string',
            'price' => 'string',
            'description' => '',
            'category_id' => ''
        ]);
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
