<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class UpdateController extends Controller
{
   public function __invoke(Product $product)
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
       return redirect()->route('product.show', $product->id);
   }
}
