<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function renderUserProfile()
    {
        $user = Auth::user();
        return view('main.user-profile', ['user' => $user]);
    }

    public function updateUserProfile($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'mimes:png,jpg,jpeg']
        ]);

        //        return dd($request);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->dateOfBirth = $request->get('dateOfBirth');
        $user->address = $request->get('address');

        try {
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $name = Carbon::today()->format('Ymd') . "-" . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $name = $this->convertSpecialCharacters($name);
                $name = $name . "." . $image->getClientOriginalExtension();
                Storage::disk('s3')->put($name,  File::get($avatar));
                $user->avatar = Storage::disk('s3')->url("uploads/{$name}");
            }

            $user->save();
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->to("user/profile");
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => false, "message" => $validator->errors()->first()]);
        }
        if (!Hash::check($request->get('old_password'), Auth::user()->password)) {
            return  response()->json(['status' => false, "message" => "Old Password False"]);
        };
        $new_password = $request->get("new_password");
        $user = Auth::user();
        $user->update([
            "password" => Hash::make($new_password),
        ]);

        return response()->json(['status' => true, "message" => "Change Password Successfully"]);
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
