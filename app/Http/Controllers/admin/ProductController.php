<?php

namespace App\Http\Controllers\Admin;

use App\CategoryProduct;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

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
            'gallery' => collect(Storage::disk('s3')->files("uploads"))
                ->map(function ($name) {
                    $file = new SplFileInfo($name, Storage::disk('s3')->url("uploads"), Storage::disk('s3')->url($name));
                    $file->mTime = Carbon::createFromTimestamp(Storage::disk('s3')->lastModified($name))->format('Y-m-d H:i:s');
                    $file->size = Storage::disk('s3')->size($name);
                    return $file;
                })
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'jpeg', 'jpg']);
                })->sortBy(function ($file) {
                    return $file->mTime;
                }),
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
            'allCompany' => Company::all(),
            'gallery' => collect(Storage::disk('s3')->files("uploads"))
                ->map(function ($name) {
                    $file = new SplFileInfo($name, Storage::disk('s3')->url("uploads"), Storage::disk('s3')->url($name));
                    $file->mTime = Carbon::createFromTimestamp(Storage::disk('s3')->lastModified($name))->format('Y-m-d H:i:s');
                    $file->size = Storage::disk('s3')->size($name);
                    return $file;
                })
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'jpeg', 'jpg']);
                })->sortBy(function ($file) {
                    return $file->mTime;
                }),
        ];

        return view('admin/new-product')->with($p);
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required'
        ], [
            'company_id.required' => "The company field is required."
        ]);

        $product = new Product;
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->category_product_id = $request->get('category_product_id');
        $product->company_id = $request->get('company_id');
        $product->thumbnail = $request->get('thumbnail');
        $product->gallery = json_decode($request->get("gallery"));

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
            'company_id' => 'required'
        ], [
            'company_id.required' => "The company field is required."
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->category_product_id = $request->get('category_product_id');
        $product->company_id = $request->get('company_id');
        $product->thumbnail = $request->get('thumbnail');
        $product->gallery = json_decode($request->get("gallery"));

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
