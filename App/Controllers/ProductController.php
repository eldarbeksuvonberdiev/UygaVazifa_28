<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{

    public function index()
    {
        return view("Product/index", "Products");
    }
}
