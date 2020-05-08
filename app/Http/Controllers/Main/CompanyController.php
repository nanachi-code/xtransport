<?php

namespace App\Http\Controllers\Main;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companyDetail($id)
    {
        $p = [
            'company' => Company::find($id)
        ];
        return view('main.single-company')->with($p);
    }
}
