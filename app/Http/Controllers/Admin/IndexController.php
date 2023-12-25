<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
        $data = [
            'userCount' => User::all()->count(),
            'colorCount' => Color::all()->count(),
            'categoryCount' => Category::all()->count(),
            'productCount' => Product::all()->count()
            ];

        return view('admin.index', compact('data'));
    }



    public function show(Color $color)
    {

    }


}
