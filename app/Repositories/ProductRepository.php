<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(Request $request): Builder|\Illuminate\Support\Collection
    {
        $products = DB::table('products');
        if ($request->query()) {
            $category = $request->query('category');
            $min_price = $request->query('minprice');
            $max_price = $request->query('maxprice');
            if($category){
                $products->where('category', $category);
            }

            if($min_price && $max_price){
                $products->where('price->original', '>=', $min_price)
                    ->where('price->original', '<=', $min_price);
            }elseif($min_price){
                $products->where('price->original', '>=', $min_price);
            }elseif($max_price){
                $products->where('price->original', '<=', $min_price);
            }

        }

        return $products->get(['sku', 'name', 'category', 'price->original as price']);
    }


}
