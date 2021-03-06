<?php

namespace App\Http\Controllers\Admin;

use App\CategoryPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

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
            'allCategories' => CategoryPost::all(),
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

        return view('admin/single-post')->with($p);
    }

    public function renderNewPost()
    {
        $p = [
            'allCategories' => CategoryPost::all(),
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
        $post->excerpt = $request->get('excerpt');
        $post->status = "publish";
        $post->user_id = Auth::user()->id;
        $post->category_post_id = $request->get('category_post_id');
        $post->thumbnail = $request->get('thumbnail');

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
        $post->excerpt = $request->get('excerpt');
        $post->category_post_id = $request->get('category_post_id');
        $post->thumbnail = $request->get('thumbnail');

        try {
            $post->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "Post info updated successfully.",
            "id" => $request->get('category_post_id')
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
