<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Feedback;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function renderDashboard()
    {
        $p = [
            "todayComments" => Comment::whereDate('created_at', Carbon::today())->get(),
            "countTodayComments" => Comment::whereDate('created_at', Carbon::today())->count(),
            "countYesterdayComments" => Comment::whereDate('created_at', Carbon::yesterday())->count(),
            "countTodayPosts" => Post::whereDate('created_at', Carbon::today())->count(),
            "countYesterdayPosts" => Post::whereDate('created_at', Carbon::yesterday())->count(),
            "countTodayUsers" => User::whereDate('created_at', Carbon::today())->count(),
            "countYesterdayUsers" => User::whereDate('created_at', Carbon::yesterday())->count(),
            "countTodayUsers" => User::whereDate('created_at', Carbon::today())->count(),
            "countYesterdayUsers" => User::whereDate('created_at', Carbon::yesterday())->count(),
            "countTodayFeedback" => Feedback::whereDate('created_at', Carbon::today())->count(),
            "countYesterdayFeedback" => Feedback::whereDate('created_at', Carbon::yesterday())->count(),
        ];
        return view('admin/dashboard')->with($p);
    }
}
