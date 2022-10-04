<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(Request $request): Collection
    {
        if ($request->query()) {
            $category = $request->query('category');
            $min_price = $request->query('minprice');
            $max_price = $request->query('maxprice');
        } else {
            return Product::all('sku', 'name', 'category', 'price->original as price');
        }
    }


}
