<?php

namespace App\Http\Controllers\Main;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    public function archiveDocument()
    {
        $p = [
            'location' => '',
            'newest' => Document::orderBy('updated_at','desc')->take(3)->get()
        ];
        return view('library')->with($p);
    }

    public function userDocument()
    {
        $p = [
            'location' => 'user',
            'documents' => Document::where('user_id',Auth::user()->id)->get()
        ];
        return view('mydocument')->with($p);
    }

    public function bookmarkDocument()
    {
        $p = [
            'location' => 'bookmark',
            'bookmarked' => Auth::user()->documents
        ];
        return view('bookmark')->with($p);
    }

    public function addBookmark($id)
    {
        $document = Document::find($id);
        $document->users()->attach(Auth::user()->id);
        return redirect()->back();
    }

    public function unBookmark($id)
    {
        $document = Document::find($id);
        $document->users()->detach(Auth::user()->id);
        return redirect()->back();
    }

    public function createDocument()
    {
        return view('create-document');
    }

    public function newDocument(Request $request)
    {
        $ext_allow = ['doc','docx','pdf'];
        $document = $request->all();
        $document['user_id'] = Auth::user()->id;
        if ($request->hasFile('file')) {
            $document['file'] = $request->file->getClientOriginalName();

            $ext = $request->file->getClientOriginalExtension();
            if(in_array($ext,$ext_allow)){
                $request->file->storeAs('documents/'.Auth::user()->id,$document['file'],'uploads');
            }
        }
        $document = Document::create($document);
        return redirect()->to('library/detail/'.$document->id);
    }

    public function detailDocument($id)
    {
        $p = [
            'doc' => $document = Document::find($id),
            'pathToFile' => asset("uploads/documents/".$document->user_id.'/'.$document->file)

        ];
        return view('document')->with($p);
    }
    public function downloadDocument($id)
    {
        $document = Document::find($id);
        try {
            $document->increment('download_number');
            //dd($document->increment('download_number'));
            $pathToFile = public_path("uploads/documents/".$document->user_id.'/'.$document->file);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return dd($document->increment('download_number'));
        //return response()->download($pathToFile);
    }

    public function rating(Request $request){
        request()->validate(['rate' => 'required']);
        $document = Document::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $document->ratings()->save($rating);

        return redirect()->to("document")->with(compact($document));
    }


}
