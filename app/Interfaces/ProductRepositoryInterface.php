<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts($category, $min_price, $max_price);
}
