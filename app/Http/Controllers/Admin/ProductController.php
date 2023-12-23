<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'string',
            'price' => 'string',
            'description' => '',
            'category_id' => 'required|integer|exists:categories,id',
            'color_ids' => 'nullable|array',
            'color_ids.*' => 'nullable|integer|exists:colors,id',
            'image' => "required|file"
        ]);

        $colors = $data['color_ids'];
        unset($data['color_ids']);

        $data['image'] = Storage::disk('public')->put('/images', $data['image']);


        $existingRecord = Product::withTrashed()->where('name', $data['name'])->first();

        $existingRecord ? $existingRecord->restore() : $product = Product::firstOrCreate($data);

        if (isset($colors)) {
            $product->colors()->attach($colors, ['created_at' => new \DateTime('now')]);
        }

        return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
        $colors = Color::all();
        return view('admin.product.show', compact('product', 'colors'));
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
            'category_id' => 'required|integer|exists:categories,id',
            'color_ids' => 'nullable|array',
            'color_ids.*' => 'nullable|integer|exists:colors,id'
        ]);

        $colors = $data['color_ids'];
        unset($data['color_ids']);

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

