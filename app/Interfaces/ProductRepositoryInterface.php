<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function getAllProducts(Request $request);
}
