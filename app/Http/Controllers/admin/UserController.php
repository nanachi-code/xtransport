<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

class UserController extends Controller
{
    public function renderArchiveUser()
    {
        $p = [
            'users' => User::where('role', '!=', 'super_admin')->get()
        ];

        return view('admin/archive-user')->with($p);
    }

    public function renderSingleUser($id)
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
            'user' => User::where('id', $id)->first()
        ];

        return view('admin/single-user')->with($p);
    }

    public function renderNewUser()
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
        return view('admin/new-user')->with($p);
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string']
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->status = "active";
        $user->role = $request->get('role');
        $user->avatar = $request->get('avatar');

        try {
            $user->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "redirect" => url("admin/user/{$user->id}")
        ], 200);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string']
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->role = $request->get('role');
        $user->avatar = $request->get('avatar');

        try {
            $user->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "User info updated successfully."
        ], 200);
    }

    public function disableUser($id)
    {
        $user = User::find($id);
        try {
            $user->status = "disable";
            $user->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/user');
    }

    public function restoreUser($id)
    {
        $user = User::find($id);
        try {
            $user->status = "active";
            $user->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/user');
    }
}
