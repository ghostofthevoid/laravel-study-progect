<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class StoreController extends Controller
{
   public function __invoke()
   {
       $data = request()->validate([
           'name' => 'required|unique:products|string',
           'price' => 'required|string',
           'description' => '',
           'category_id' => '',
           'colors' => ''
       ]);

       $colors = $data['colors'];
       unset($data['colors']);

       $product = Product::create($data);

       if (isset($colors)) {
           $product->colors()->attach($colors, ['created_at' => new \DateTime('now')]);
       }
       return redirect()->route('product.index');
   }
}
