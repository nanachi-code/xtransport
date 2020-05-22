<?php

namespace App\Http\Controllers\Main;

use App\Event;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function renderArchiveUpcomingEvent()
    {
        $p = [
            'events' => Event::where('status', 'active')
                ->whereDate("date", ">=", Carbon::today())
                ->paginate(9),
            'page' => 'Upcoming Events'
        ];
        return view('main.archive-event')->with($p);
    }

    public function renderArchiveAllEvent()
    {
        $p = [
            'events' => Event::where('status', 'active')
                ->paginate(9),
            'page' => 'All Events'
        ];
        return view('main.archive-event')->with($p);
    }


    public function renderSingleEvent($id)
    {
        $p = [
            'event' => Event::find($id),
            "latestEvents" => Event::where("status", "active")
                ->where("id", "!=", $id)
                ->take(3)
                ->get(),
        ];
        return view('main.single-event')->with($p);
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
            if ($event->users->count() == $event->max_users) {
                return response()->json([
                    "errors" => [
                        "full" => ["This event is already full."]
                    ]
                ], 406);
            }
            $event->users()->attach(Auth::user()->id);
            $event->load("users");
        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json([
            "message" => "You have successfully registered for this event. An email with detailed instruction has been sent to you.",
            "registered_count" => $event->users->count(),
            "is_full" => $event->users->count() == $event->max_users
        ], 200);
    }

    public function unregisterEvent(Request $request, $id)
    {
        $event = Event::find($id);
        try {
            $event->users()->detach(Auth::user()->id);
        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json([
            "message" => "You have successfully unregistered for this event.",
            "registered_count" => $event->users->count(),
            "is_full" => $event->users->count() == $event->max_users
        ], 200);
    }
}
