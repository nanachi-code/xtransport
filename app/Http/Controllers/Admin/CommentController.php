<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function renderArchiveComment()
    {
        $p = [
            'comments' => Comment::all()
        ];

        return view('admin/archive-comment')->with($p);
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        try {
            $comment->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/comment');
    }

    public function deletePostComment(Request $request, $id)
    {
        $comment = Comment::find($request->id);
        try {
            $comment->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json([
            'message' => 'Comment deleted successfully.'
        ], 200);
    }
}
