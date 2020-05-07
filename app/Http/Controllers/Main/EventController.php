<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function archiveEvent()
    {
        $p = [
            'event' => \App\Event::where('status','active')->paginate(9)
        ];
        return view('event-list')->with($p);
    }

    public function eventDetail($id)
    {
        $p = [
            'event' => \App\Event::find($id)
        ];
        return view('event')->with($p);
    }
}
