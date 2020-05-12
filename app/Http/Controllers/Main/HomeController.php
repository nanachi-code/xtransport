<?php

namespace App\Http\Controllers\Main;

use App\Company;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function renderHome()
    {
        $p = [
            "allCompanies" => Company::all(),
            "allPosts" => Post::where('status', 'publish')->take(9)->get()
        ];
        return view('main.home')->with($p);
    }
}
