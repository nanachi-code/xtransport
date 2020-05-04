<?php

namespace App\Http\Controllers\Main;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function singlePost($id)
    {
        $p = [
            'post' => Post::find($id),
            'related_post' => Post::where('status', 'publish')->where('id', '!=', $id)->take(2)->get()
        ];
        // return dd($p);
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
                    "avatar" => url("uploads", Auth::user()->avatar)
                ],
                "updated_at" => $comment->updated_at,
                "content" => $comment->content,
                "action" => url("post/{$id}/comment")
            ]
        ], 200);
    }
}
