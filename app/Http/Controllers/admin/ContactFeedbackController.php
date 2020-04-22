<?php

namespace App\Http\Controllers\Admin;

use App\ContactFeedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactFeedbackController extends Controller
{
    public function renderArchiveFeedback()
    {
        $p = [
            'feedback' => ContactFeedback::all()
        ];

        return view('admin/archive-feedback')->with($p);
    }

    public function renderSingleFeedback($id)
    {
        $p = [
            'feedback' => ContactFeedback::where('id', $id)->first()
        ];

        return view('admin/single-feedback')->with($p);
    }


    public function deleteFeedback($id)
    {
        $category = ContactFeedback::find($id);
        try {
            $category->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/feedback');
    }
}
