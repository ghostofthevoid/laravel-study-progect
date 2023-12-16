<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();

       $colors = $data['colors'];
       unset($data['colors']);

       $product = Product::create($data);

       if (isset($colors)) {
           $product->colors()->attach($colors, ['created_at' => new \DateTime('now')]);
       }
       return redirect()->route('product.index');
   }
}
