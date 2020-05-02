<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function singlePost($id)
    {
        $p = [
            'post' => $post = \App\Post::find($id),
            'related_post' => \App\Post::take(2)->where('category_post_id',$post->category_post_id)->get()
        ];
        return view('single-blog')->with($p);
    }
}
