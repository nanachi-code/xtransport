<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function renderArchiveCategory()
    {
        $p = [
            'categories' => ProductCategory::all()
        ];

        return view('admin/archive-category-product')->with($p);
    }

    public function renderSingleCategory($id)
    {
        $p = [
            'category' => ProductCategory::where('id', $id)->first()
        ];

        return view('admin/single-category-product')->with($p);
    }

    public function createCategory(Request $request)
    {
        $category = new ProductCategory;
        $category->name = $request->get('name');
        try {
            $category->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "message" => "Created new category successfully.",
            "category" => [
                "name" => $category->name,
                "id" => $category->id,
                "categoryUrl" => url("/admin/category-product/{$category->id}"),
                "deleteUrl" => url("/admin/category-product/{$category->id}/delete")
            ]
        ], 200);
    }

    public function deleteCategory($id)
    {
        $category = ProductCategory::find($id);
        try {
            $category->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/category-product');
    }

    public function updateCategory(Request $request, $id)
    {
        try {
            ProductCategory::find($id)
                ->update($request->all());
        } catch (\Exception $e) {
            throw $e;
        }
        return response()->json([
            "message" => "Category info updated successfully."
        ], 200);
    }
}
