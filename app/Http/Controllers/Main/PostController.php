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
            'related_post' => $related_post = \App\Post::where('status','publish')->where('id','!=',$id)->take(2)->get()
        ];
        return view('single-blog')->with($p);
    }
}
