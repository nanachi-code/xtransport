<?php

namespace App\Http\Controllers\Main;

use App\CategoryProduct;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function renderArchiveProduct()
    {
        $p = [
            'products' => Product::where('status', 'publish')->paginate(12),
            'allCategories' => CategoryProduct::all()
        ];
        return view('archive-product')->with($p);
    }

    public function renderSingleProduct($id)
    {
        $p = [
            'product' => Product::find($id)
        ];

        return view('single-product')->with($p);
    }
}
