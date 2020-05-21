<?php

namespace App\Http\Controllers\Main;

use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {

        return view('main.contact');
    }
    public function contactFeedback(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'website_url' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string', 'max:255'],
        ]);
        try {
            Feedback::create([
                "name" => $request->get('name'),
                "email" => $request->get('email'),
                "website_url" => $request->get('website_url'),
                "comment" => $request->get('comment'),
            ]);
        } catch (\Exception $e) {
            return redirect()->back();
        }
        return response()->json([
            "message" => "Your feedback is successfully recorded."
        ], 200);
    }
}
