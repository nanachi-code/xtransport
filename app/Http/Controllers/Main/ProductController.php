<?php

namespace App\Http\Controllers\Main;

use App\CategoryProduct;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function renderArchiveProduct()
    {
        $p = [
            'products' => Product::where('status', 'publish')->paginate(12),
            'allCategories' => CategoryProduct::all()
        ];
        return view('main.archive-product')->with($p);
    }

    public function renderSingleProduct($id)
    {
        $p = [
            'product' => Product::find($id)
        ];

        return view('main.single-product')->with($p);
    }
}
