<?php

namespace App\Http\Controllers\Main;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class LibraryController extends Controller
{
    public function archiveDocument()
    {
        $doc = Document::all()->where('status',Document::PUBLISH)->sort(function ($a, $b) {
            if ($a->averageRating == $b->averageRating) {
                return 0;
            }
            return ($a->averageRating > $b->averageRating) ? -1 : 1;
        });
        $p = [
            'location' => '',
            'newest' => Document::orderBy('updated_at', 'desc')->where('status',Document::PUBLISH)->take(3)->get(),
            'highest_rate' => $doc->slice(0, 3)
        ];
        return view('main.library')->with($p);
    }

    public function allDocument()
    {
        $p = [
            'doc' => Document::orderBy('updated_at', 'desc')->where('status',Document::PUBLISH)->paginate(12)
        ];
        return view('main.doclist')->with($p);
    }

    public function userDocument()
    {
        $p = [
            'location' => 'user',
            'documents' => Document::where('user_id', Auth::user()->id)->get()
        ];
        return view('main.mydocument')->with($p);
    }

    public function bookmarkDocument()
    {
        $p = [
            'location' => 'bookmark',
            'bookmarked' => Auth::user()->documents
        ];
        return view('main.bookmark')->with($p);
    }

    public function addBookmark($id)
    {
        $document = Document::find($id);
        $document->increment('bookmark_number');
        $document->users()->attach(Auth::user()->id);
        return redirect()->back();
    }

    public function unBookmark($id)
    {
        $document = Document::find($id);
        $document->decrement('bookmark_number');
        $document->users()->detach(Auth::user()->id);
        return redirect()->back();
    }

    public function createDocument()
    {
        return view('main.create-document');
    }

    public function newDocument(Request $request)
    {
        $ext_allow = ['doc', 'docx', 'pdf'];
        $document = $request->all();
        $document['user_id'] = Auth::user()->id;
        if ($request->hasFile('file')) {
            $name = $request->file->getClientOriginalName();
            $ext = $request->file->getClientOriginalExtension();
            if (in_array($ext, $ext_allow)) {
                $request->file->storeAs("uploads/documents/{$document['user_id']}/",$name,'s3');
            }
            $document['file'] = Storage::disk('s3')->url("uploads/documents/{$document['user_id']}/{$name}");
        }
        $document = Document::create($document);
        return redirect()->to('library/' . $document->id.'/detail/');
    }

    public function detailDocument($id)
    {
        $rate_flag = \willvincent\Rateable\Rating::where('rateable_id', $id)->get();
        if ($rate_flag->contains('user_id', Auth::user()->id)) {
            $rate_flag = false;
        } else $rate_flag = true;
        $p = [
            'doc' => $document = Document::find($id),
            'review' => \willvincent\Rateable\Rating::where('rateable_id', $id)->get(),
            'rate_flag' => $rate_flag
        ];
        return view('main.document')->with($p);
    }

    public function downloadDocument($id)
    {
        try {
            $document = Document::find($id);
            $document->increment('download_number');
            $file = last(explode('/',$document->file));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function rating(Request $request)
    {

        request()->validate(['rate' => 'required']);
        $document = Document::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $rating->review = $request->review;
        $document->ratings()->save($rating);
        return redirect()->back();
    }
}
