<?php

namespace App\Http\Controllers\Main;

use App\CategoryPost;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function renderArchivePost($id = null)
    {
        $p = [
            'post' => $id
                ? Post::where('category_post_id', $id)->where('status', 'publish')->paginate(4)
                : Post::where('status', 'publish')->paginate(4),
            'location' => $id ? CategoryPost::find($id)->name : "Blog"
        ];
        return view('archive-post')->with($p);
    }

    public function renderSinglePost($id)
    {
        $p = [
            'post' => $post = Post::find($id),
            'relatedPost' => Post::where('status', 'publish')
                ->where('id', '!=', $id)
                ->where('category_post_id', '!=', $post->category_post_id)
                ->take(2)
                ->get()
        ];
        return view('single-post')->with($p);
    }

    public function saveComment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        if ($request->has("parent_id")) {
            $comment->parent_id = $request->parent_id;
        }
        try {
            $comment->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json([
            "message" => "Your comment was successfully added.",
            "comment" => [
                "id" => $comment->id,
                "user" => [
                    "name" => Auth::user()->name,
                    "avatar" => Auth::user()->avatar ? url("uploads", Auth::user()->avatar) : asset("images/default/no-image.jpg")
                ],
                "updated_at" => $comment->updated_at->toDateTimeString(),
                "content" => $comment->content,
                "action" => url("post/{$id}/comment")
            ]
        ], 200);
    }
}
