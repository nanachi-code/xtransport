<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function singleProduct($id)
    {
        $p = [
            'product' => $product = \App\Product::find($id)
        ];

        return view('single-product')->with($p);
    }
}
