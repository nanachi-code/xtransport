<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function renderArchiveEvent()
    {
        $p = [
            'events' => Event::all()
        ];

        return view('admin/archive-event')->with($p);
    }

    public function renderSingleEvent($id)
    {
        $p = [
            'event' => Event::where('id', $id)->first(),
            'select_post' => \App\Post::where('status','publish')->where('category_post_id',null)->get(),
            'gallery' => collect(File::allFiles(public_path('uploads')))
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
                })
                ->sortBy(function ($file) {
                    return $file->getCTime();
                })
        ];

        return view('admin/single-event')->with($p);
    }

    public function renderNewEvent()
    {
        $p = [
            'select_post' => DB::table('post')->leftJoin('event','post.id','=','event.post_id')
            ->where('event.post_id',null)->select('post.id','post.title')->get(),
            'gallery' => collect(File::allFiles(public_path('uploads')))
            ->filter(function ($file) {
                return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
            })
            ->sortBy(function ($file) {
                return $file->getCTime();
            })
        ];
        return view('admin/new-event')->with($p);
    }

    public function createEvent(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string']
        ]);
        $event = new Event;
        $event->name = $request->get('name');
        $event->address = $request->get('address');
        $event->date = $request->get('date');
        $event->status = "active";
        $event->post_id = $request->get('post_id');
        $event->thumbnail = $request->get('thumbnail');

        try {
            $event->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "redirect" => url("admin/event/{$event->id}")
        ], 200);
    }

    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string']
            ]);

        $event = Event::find($id);
        $event->name = $request->get('name');
        $event->address = $request->get('address');
        $event->date = $request->get('date');
        $event->post_id = $request->get('post_id');
        $event->thumbnail = $request->get('thumbnail');

        try {
            $event->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "event info updated successfully."
        ], 200);
    }

    public function disableEvent($id)
    {
        $event = Event::find($id);
        try {
            $event->status = "disable";
            $event->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/event');
    }

    public function restoreEvent($id)
    {
        $event = Event::find($id);
        try {
            $event->status = "active";
            $event->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/event');
    }
}
