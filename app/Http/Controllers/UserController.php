<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function userProfile()
    {
        $user = Auth::user();
        return view('user.user-profile', ['user' => $user]);
    }
    public function userProfileUpdate($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->dateOfBirth = $request->get('dateOfBirth');
        $user->address = $request->get('address');
        $avatar = $request->file('avatar');

        if (Storage::disk('uploads')->exists($avatar->getClientOriginalName())) {
            $name = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME) . "_1." . $avatar->getClientOriginalExtension();
        } else {
            $name = $avatar->getClientOriginalName();
        }
        Storage::disk('uploads')->put($name,  File::get($avatar));

        try {
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
            return response()->json(["status" => false, "messenger" => $validator->errors()->first()]);
        }
        if (!Hash::check($request->get('old_password'), Auth::user()->password)) {
            return  response()->json(['status' => false, "messenger" => "Old Password False"]);
        };
        $new_password = $request->get("new_password");
        $user = Auth::user();
        $user->update([
            "password" => Hash::make($new_password),
        ]);

        return response()->json(['status' => true, "messenger" => "Change Password Successfully"]);
    }
}
