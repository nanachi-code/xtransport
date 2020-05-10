<?php

namespace App\Http\Controllers\Main;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function renderHome()
    {
        $p = [
            "allCompanies" => Company::all()
        ];
        return view('main.home')->with($p);
    }
}
