<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts($category="", $min_price="", $max_price=""): Collection
    {
        return Product::all('sku', 'name','category', 'price->original as price');
    }
}
