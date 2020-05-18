<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function renderArchiveFeedback()
    {
        $p = [
            'feedbacks' => Feedback::all()
        ];

        return view('admin/archive-feedback')->with($p);
    }

    public function renderSingleFeedback($id)
    {
        $p = [
            'feedback' => Feedback::where('id', $id)->first()
        ];

        return view('admin/single-feedback')->with($p);
    }


    public function deleteFeedback($id)
    {
        $category = Feedback::find($id);
        try {
            $category->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/feedback');
    }
}
