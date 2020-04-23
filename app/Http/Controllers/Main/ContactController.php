<?php

namespace App\Http\Controllers\Main;

use App\ContactFeedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){

        return view('contact');
    }
    public function contactFeedback(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'website_url' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string', 'max:255'],
        ]);
        try {
            ContactFeedback::create([
                "name" => $request->get('name'),
                "email" => $request->get('email'),
                "website_url" => $request->get('website_url'),
                "comment" => $request->get('comment'),
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect("/contact");

    }
}
