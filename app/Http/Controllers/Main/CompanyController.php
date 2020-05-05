<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companyDetail($id)
    {
        $p = [
            'company' => \App\Company::find($id)
        ];
        return view('company-detail')->with($p);
    }
}
