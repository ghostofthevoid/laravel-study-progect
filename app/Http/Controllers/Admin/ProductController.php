<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
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
        try {
            DB::beginTransaction();
            $data = request()->validate([
                'name' => 'string',
                'price' => 'string',
                'description' => '',
                'category_id' => 'required|integer|exists:categories,id',
                'color_ids' => 'nullable|array',
                'color_ids.*' => 'nullable|integer|exists:colors,id',
                'image' => "required|file"
            ]);

            if (isset($data['color_ids'])) {
                $colors = $data['color_ids'];
                unset($data['color_ids']);
            }

            $data['image'] = Storage::disk('public')->put('/images', $data['image']);


            $existingRecord = Product::withTrashed()->where('name', $data['name'])->first();

            $existingRecord ? $existingRecord->restore() : $product = Product::firstOrCreate($data);

            if (isset($colors)) {
                $product->colors()->attach($colors, ['created_at' => new \DateTime('now')]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
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
        try {
            DB::beginTransaction();
            $data = request()->validate([
                'name' => 'string',
                'price' => 'string',
                'description' => '',
                'category_id' => 'required|integer|exists:categories,id',
                'color_ids' => 'nullable|array',
                'color_ids.*' => 'nullable|integer|exists:colors,id',
                'image' => "nullable|file"
            ]);

            $colors = $data['color_ids'];
            unset($data['color_ids']);

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $product->update($data);
            $product->colors()->sync($colors);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        $colors = Color::all();
        return view('admin.product.show', compact('product', 'colors'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}

