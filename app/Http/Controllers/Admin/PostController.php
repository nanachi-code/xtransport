<?php

namespace App\Http\Controllers\Admin;

use App\CategoryPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function renderArchivePost()
    {
        $p = [
            'posts' => Post::all()
        ];

        return view('admin/archive-post')->with($p);
    }

    public function renderSinglePost($id)
    {
        $p = [
            'post' => Post::find($id),
            'allCategories' => CategoryPost::all()
        ];

        return view('admin/single-post')->with($p);
    }

    public function renderNewPost()
    {
        $p = [
            'allCategories' => CategoryPost::all()
        ];

        return view('admin/new-post')->with($p);
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->status = "publish";
        $post->user_id = Auth::check() ? Auth::user()->id : 1;
        $post->category_post_id = $request->get('category_post_id');
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            Storage::disk('public')->put($thumbnail->getClientOriginalName(),  File::get($thumbnail));
            $post->thumbnail = $thumbnail->getClientOriginalName();
        } else {
            $post->thumbnail = null;
        }

        try {
            $post->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "redirect" => url("admin/post/{$post->id}")
        ], 200);
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->category_post_id = $request->get('category_post_id');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            Storage::disk('public')->put($thumbnail->getClientOriginalName(),  File::get($thumbnail));
            $post->thumbnail = $thumbnail->getClientOriginalName();
        }

        try {
            $post->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "redirect" => url("admin/post/{$post->id}"),
            "message" => "Post info updated successfully."
        ], 200);
    }

    public function deletePost($id)
    {
        $product = Post::find($id);
        try {
            $product->status = "trashed";
            $product->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/post');
    }

    public function restorePost($id)
    {
        $product = Post::find($id);
        try {
            $product->status = "publish";
            $product->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/post');
    }
}
