<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(6);
        return view('admin.color.colors', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['title'] = ucfirst($data['title']);
        $existingRecord = Color::withTrashed()->where($data)->first();
        $existingRecord ? $existingRecord->restore() :  Color::firstOrCreate($data);

        return redirect()->route('admin.color.index');
    }

    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(Color $color)
    {
        $data = request()->validate(['title' => 'string']);
        $color->update($data);
        return view('admin.color.show', compact('color'));
    }

    public function delete(Color $color)
    {
        $color->products()->delete();
        $color->delete();
        return redirect()->route('admin.color.index');
    }
}

