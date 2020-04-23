<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function renderGallery()
    {
        $p = [
            'gallery' => collect(File::allFiles(public_path('uploads')))
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
                })
                ->sortBy(function ($file) {
                    return $file->getCTime();
                })
        ];
        return view('admin/gallery')->with($p);
    }

    public function deleteAttachment($attachmentName)
    {
        if (Storage::disk("uploads")->exists($attachmentName)) {
            try {
                Storage::disk("uploads")->delete($attachmentName);
            } catch (\Throwable $th) {
                throw $th;
            }
            //TODO Flash session message
            $message = "Delete attachment successfully.";
            $status = "success";
            return redirect("admin/gallery");
        } else {
            //TODO Flash session message
            $message = "Attachment not found.";
            $status = "error";
            return redirect("admin/gallery");
        }
    }

    public function uploadAttachment(Request $request)
    {
        if ($request->hasFile("image")) {
            $image = $request->file('image');

            try {
                if (Storage::disk('uploads')->exists($image->getClientOriginalName())) {
                    $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . "_1." . $image->getClientOriginalExtension();
                } else {
                    $name = $image->getClientOriginalName();
                }
                Storage::disk('uploads')->put($name,  File::get($image));
            } catch (\Throwable $th) {
                throw $th;
            }
            return response()->json([
                "message" => "Attachment uploaded successfully.",
                "image" => [
                    "src" => asset("uploads/{$image->getClientOriginalName()}"),
                    "size" => Storage::disk('uploads')->size($image->getClientOriginalName()),
                    "filename" => $image->getClientOriginalName()
                ]
            ], 200);
        }
    }
}
