<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

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
            'select_post' => \App\Post::where('status', 'publish')->where('category_post_id', null)->get(),
            'gallery' => collect(Storage::disk('s3')->files("uploads"))
                ->map(function ($name) {
                    $file = new SplFileInfo($name, Storage::disk('s3')->url("uploads"), Storage::disk('s3')->url($name));
                    $file->mTime = Carbon::createFromTimestamp(Storage::disk('s3')->lastModified($name))->format('Y-m-d H:i:s');
                    $file->size = Storage::disk('s3')->size($name);
                    return $file;
                })
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'jpeg', 'jpg']);
                })->sortBy(function ($file) {
                    return $file->mTime;
                }),
        ];

        return view('admin/single-event')->with($p);
    }

    public function renderNewEvent()
    {
        $p = [
            'gallery' => collect(Storage::disk('s3')->files("uploads"))
                ->map(function ($name) {
                    $file = new SplFileInfo($name, Storage::disk('s3')->url("uploads"), Storage::disk('s3')->url($name));
                    $file->mTime = Carbon::createFromTimestamp(Storage::disk('s3')->lastModified($name))->format('Y-m-d H:i:s');
                    $file->size = Storage::disk('s3')->size($name);
                    return $file;
                })
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'jpeg', 'jpg']);
                })->sortBy(function ($file) {
                    return $file->mTime;
                }),
        ];
        return view('admin/new-event')->with($p);
    }

    public function createEvent(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'max_users' => ['required','integer']
        ]);
        $event = new Event;
        $event->name = $request->get('name');
        $event->address = $request->get('address');
        $event->date = $request->get('date');
        $event->status = "active";
        $event->introduction = $request->get('introduction');
        $event->max_users = $request->get('max_users');
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
            'address' => ['required', 'string'],
            'max_users' => ['required','integer']
        ]);

        $event = Event::find($id);
        $event->name = $request->get('name');
        $event->address = $request->get('address');
        $event->date = $request->get('date');
        $event->introduction = $request->get('introduction');
        $event->max_users = $request->get('max_users');
        $event->thumbnail = $request->get('thumbnail');

        try {
            $event->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "Event info updated successfully."
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
