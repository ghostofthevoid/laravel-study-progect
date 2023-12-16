<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Product $product)
   {
       $data = $request->validated();

       $colors = $data['colors'];
       unset($data['colors']);

       $product->update($data);
       $product->colors()->sync($colors);
       return redirect()->route('product.show', $product->id);
   }
}
