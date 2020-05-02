<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allItems(){
        $p = [
            //$item = \App\Product::paginate(12)
        ];
        return view('catalog')->with($p);
    }

    public function cateItems($id){
        $p = [
            //$item = \App\Product::where()->paginate(12)
        ];
        return view('catalog')->with($p);
    }

    public function allPosts(){
        $p = [
            'post' => \App\Post::paginate(1),
            'location' => 'Blog'
        ];
        return view('blog')->with($p);
    }

    public function catePosts($id){
        $p = [
            'post' => \App\Post::where('category_post_id',$id)->where('status','publish')->paginate(4),
            'location' => \App\CategoryPost::find($id)->name
        ];
        return view('blog')->with($p);
    }
}
