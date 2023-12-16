<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class RestoreController extends BaseController
{
   public function __invoke($id)
   {
       $product = Product::withTrashed()->find($id);
       $product->restore();
       return redirect()->route('product.index');
   }
}
