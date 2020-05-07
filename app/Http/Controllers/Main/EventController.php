<?php

namespace App\Http\Controllers\Main;

use App\Event;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function archiveEvent()
    {
        $p = [
            'events' => Event::where('status', 'active')
                ->whereDate("date", ">=", Carbon::today())
                ->paginate(9)
        ];
        return view('archive-event')->with($p);
    }

    public function eventDetail($id)
    {
        $p = [
            'event' => Event::find($id)
        ];
        return view('single-event')->with($p);
    }

    public function registerEvent(Request $request, $id)
    {
        $event = Event::find($id);
        try {
            if ($event->users()->where("id", Auth::user()->id)->exists()) {
                return response()->json([
                    "errors" => [
                        "registered" => ["You have already registered for this event."]
                    ]
                ], 406);
            }
            $event->users()->sync(Auth::user()->id);
        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json([
            "message" => "You have successfully registered for this event. An email with detailed instruction has been sent to you."
        ], 200);
    }
}
