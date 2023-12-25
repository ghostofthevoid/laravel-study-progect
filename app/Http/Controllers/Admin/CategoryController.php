<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
        $categories = Category::paginate(6);
        return view('admin.category.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $existingRecord = Category::withTrashed()->where($data)->first();
        $data['title'] = ucfirst($data['title']);
        $existingRecord ? $existingRecord->restore() :  Category::firstOrCreate($data);

        return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $data = request()->validate(['title' => 'string']);
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}

