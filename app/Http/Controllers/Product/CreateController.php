<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;

class CreateController extends Controller
{
   public function __invoke()
   {
       $colors = Color::all();
       $categories = Category::all();
       return view('product.create', compact('categories', 'colors'));
   }
}
