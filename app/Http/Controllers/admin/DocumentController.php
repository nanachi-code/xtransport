<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function renderArchiveDocument()
    {
        $p = [
            'documents' => Document::all()
        ];

        return view('admin/archive-document')->with($p);
    }

    public function renderSingleDocument($id)
    {
        $p = [
            'document' => Document::find($id)
        ];

        return view('admin/single-document')->with($p);
    }

    public function deleteDocument($id)
    {
        $document = Document::find($id);
        try {
            $document->status = Document::DELETED;
            $document->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/document');
    }

    public function restoreDocument($id)
    {
        $document = Document::find($id);
        try {
            $document->status = Document::PUBLISH;
            $document->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/document');
    }

    public function publishDocument($id)
    {
        return $this->restoreDocument($id);
    }
}
