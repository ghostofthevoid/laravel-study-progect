<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('admin.product.products', compact('products'));
    }

    public function create()
    {
        $colors = Color::all();
        $categories = Category::all();
        return view('admin.product.create', compact('categories', 'colors'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'description' => '',
            'category_id' => '',
            'colors' => ''
        ]);

        $colors = $data['colors'];
        unset($data['colors']);

        $data['name'] = ucfirst($data['name']);
        $existingRecord = Product::withTrashed()->where('name', $data['name'])->first();

        $existingRecord ? $existingRecord->restore() : $product = Product::firstOrCreate($data);

        if (isset($colors)) {
            $product->colors()->attach($colors, ['created_at' => new \DateTime('now')]);
        }

        return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.product.edit', compact('product', 'categories', 'colors'));
    }

    public function update(Product $product)
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

        $product->update($data);
        $product->colors()->sync($colors);
        return view('admin.product.show', compact('product'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}

