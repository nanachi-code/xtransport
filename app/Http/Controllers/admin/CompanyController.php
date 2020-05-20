<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

class CompanyController extends Controller
{
    public function renderArchiveCompany()
    {
        $p = [
            'companies' => Company::all()
        ];

        return view('admin/archive-company')->with($p);
    }

    public function renderSingleCompany($id)
    {
        $p = [
            'company' => Company::where('id', $id)->first(),
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

        return view('admin/single-company')->with($p);
    }

    public function renderNewCompany()
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
        return view('admin/new-company')->with($p);
    }

    public function createCompany(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:company'],
            'phone' => ['required', 'string', 'min:8', 'unique:company'],
            'address' => ['required', 'string'],
            'website' => ['required', 'string']
        ]);

        $company = new Company;
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->phone = $request->get('phone');
        $company->address = $request->get('address');
        $company->website = $request->get('website');
        $company->status = "active";
        $company->logo = $request->get('logo');
        $company->introduction = $request->get('introduction');
        try {
            $company->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "redirect" => url("admin/company/{$company->id}")
        ], 200);
    }

    public function updateCompany(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191', 'unique:company,name,' . $id],
            'phone' => ['required', 'string', 'min:8'],
            'address' => ['required', 'string']
        ]);

        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->phone = $request->get('phone');
        $company->address = $request->get('address');
        $company->website = $request->get('website');
        $company->logo = $request->get('logo');
        $company->introduction = $request->get('introduction');

        try {
            $company->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "Company info updated successfully."
        ], 200);
    }

    public function disableCompany($id)
    {
        $company = Company::find($id);
        try {
            $company->status = "disable";
            $company->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/company');
    }

    public function restoreCompany($id)
    {
        $company = Company::find($id);
        try {
            $company->status = "active";
            $company->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/company');
    }
}
