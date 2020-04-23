<?php

namespace App\Http\Controllers\Admin;

use App\CategoryProduct;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function renderArchiveProduct()
    {
        $p = [
            'products' => Product::all()
        ];

        return view('admin/archive-product')->with($p);
    }

    public function renderSingleProduct($id)
    {
        $p = [
            'product' => Product::where('id', $id)->first(),
            'allCategories' => CategoryProduct::all(),
             'allCompany' => Company::all()
        ];

        return view('admin/single-product')->with($p);
    }

    public function renderNewProduct()
    {
        $p = [
            'allCategories' => CategoryProduct::all(),
            'allCompany' => Company::all()
        ];

        return view('admin/new-product')->with($p);
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = new Product;
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->category_product_id = $request->get('category_product_id');
        $product->company_id = $request->get('company_id');
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            Storage::disk('public')->put($thumbnail->getClientOriginalName(),  File::get($thumbnail));
            $product->thumbnail = $thumbnail->getClientOriginalName();
        } else {
            $product->thumbnail = null;
        }
        try {
            $product->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "redirect" => url("admin/product/{$product->id}")
        ], 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->category_product_id = $request->get('category_product_id');
        $product->company_id = $request->get('company_id');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            Storage::disk('public')->put($thumbnail->getClientOriginalName(),  File::get($thumbnail));
            $product->thumbnail = $thumbnail->getClientOriginalName();
        }

        try {
            $product->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "Product info updated successfully."
        ], 200);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        try {
            $product->status = "trashed";
            $product->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/product');
    }

    public function restoreProduct($id)
    {
        $product = Product::find($id);
        try {
            $product->status = "publish";
            $product->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/product');
    }
}
