<?php

namespace App\Services\Product;

use App\Models\Product;

class Service
{
    public function store($data)
    {
        $colors = $data['colors'];
        unset($data['colors']);

        $product = Product::create($data);

        if (isset($colors)) {
            $product->colors()->attach($colors, ['created_at' => new \DateTime('now')]);
        }
    }

    public function update($product, $data)
    {
        $colors = $data['colors'];
        unset($data['colors']);
        $product->update($data);
        $product->colors()->sync($colors);
    }
}
