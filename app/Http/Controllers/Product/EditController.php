<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;

class EditController extends Controller
{
   public function __invoke(Product $product)
   {
       $categories = Category::all();
       $colors = Color::all();
       return view('product.edit', compact('product', 'categories', 'colors'));
   }
}
