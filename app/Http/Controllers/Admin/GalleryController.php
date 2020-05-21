<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    public function renderGallery()
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
        return view('admin/gallery')->with($p);
    }

    public function deleteAttachment($attachmentName)
    {
        if (Storage::disk("s3")->exists("uploads/{$attachmentName}")) {
            try {
                Storage::disk("s3")->delete("uploads/{$attachmentName}");
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
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $height = $request->height;
            $width = $request->width;
            $name = Carbon::today()->format('Ymd') . "-" . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = $this->convertSpecialCharacters($name);
            $croppedImage = Image::make($image->getRealPath());
            if ($width && $height) {
                $croppedImage
                    ->resize($width, $height);
                // ->resize($width, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // })
                // ->crop($width, $height, 0, 0);
                $name = $name . "_" . $width . "x" . $height;
            }
            $name = $name . "." . $image->getClientOriginalExtension();
            try {
                Storage::disk('s3')->put("uploads/{$name}",  $croppedImage->encode());
            } catch (\Throwable $th) {
                throw $th;
            }

            return response()->json([
                "message" => "Attachment uploaded successfully.",
                "image" => [
                    "src" => Storage::disk('s3')->url("uploads/{$name}"),
                    "size" => Storage::disk('s3')->size("uploads/{$name}"),
                    "filename" => $name
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
