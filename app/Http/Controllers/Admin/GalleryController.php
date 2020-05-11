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
        if (file_exists(public_path('uploads'))) {
            $p = [
                'gallery' => collect(File::allFiles(public_path('uploads')))
                    ->filter(function ($file) {
                        return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
                    })
                    ->sortBy(function ($file) {
                        return $file->getCTime();
                    })
            ];
        }
        else {
            mkdir(public_path('uploads'));
            $p = [
                'gallery' => []
            ];
        };
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
                    $name = $this->convertSpecialCharacters($name);
                } else {
                    $name = $image->getClientOriginalName();
                    $name = $this->convertSpecialCharacters($name);
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

    private function convertSpecialCharacters(string $str)
    {
        $str = preg_replace("/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/", "a", $str);
        $str = preg_replace("/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/", "e", $str);
        $str = preg_replace("/ì|í|ị|ỉ|ĩ/", "i", $str);
        $str = preg_replace("/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/", "o", $str);
        $str = preg_replace("/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/", "u", $str);
        $str = preg_replace("/ỳ|ý|ỵ|ỷ|ỹ/", "y", $str);
        $str = preg_replace("/đ/", "d", $str);
        $str = preg_replace("/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/", "A", $str);
        $str = preg_replace("/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/", "E", $str);
        $str = preg_replace("/Ì|Í|Ị|Ỉ|Ĩ/", "I", $str);
        $str = preg_replace("/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/", "O", $str);
        $str = preg_replace("/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/", "U", $str);
        $str = preg_replace("/Ỳ|Ý|Ỵ|Ỷ|Ỹ/", "Y", $str);
        $str = preg_replace("/Đ/", "D", $str);
        $str = preg_replace("/\s/", "-", $str);
        return $str;
    }
}
