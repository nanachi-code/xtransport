<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryPost;

class CategoryPostController extends Controller
{
    public function renderArchiveCategory()
    {
        $p = [
            'categories' => CategoryPost::all()
        ];

        return view('admin/archive-category-post')->with($p);
    }

    public function renderSingleCategory($id)
    {
        $p = [
            'category' => CategoryPost::where('id', $id)->first()
        ];

        return view('admin/single-category-post')->with($p);
    }

    public function createCategory(Request $request)
    {
        $category = new CategoryPost;
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
                "categoryUrl" => url("/admin/category-post/{$category->id}"),
                "deleteUrl" => url("/admin/category-post/{$category->id}/delete")
            ]
        ], 200);
    }

    public function deleteCategory($id)
    {
        $category = CategoryPost::find($id);
        try {
            $category->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/category-post');
    }

    public function updateCategory(Request $request, $id)
    {
        try {
            CategoryPost::find($id)
                ->update($request->all());
        } catch (\Exception $e) {
            throw $e;
        }
        return response()->json([
            "message" => "Category info updated successfully."
        ], 200);
    }
}
