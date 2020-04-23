<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
            'select_post' => \App\Post::where('status','publish')->where('category_post_id',null)->get(),
            'gallery' => collect(File::allFiles(public_path('uploads')))
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
                })
                ->sortBy(function ($file) {
                    return $file->getCTime();
                })
        ];

        return view('admin/single-company')->with($p);
    }

    public function renderNewCompany()
    {
        $p = [
            'select_post' => DB::table('post')->leftJoin('company','post.id','=','company.post_id')
            ->where('company.post_id',null)->select('post.id','post.title')->get(),
            'gallery' => collect(File::allFiles(public_path('uploads')))
            ->filter(function ($file) {
                return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
            })
            ->sortBy(function ($file) {
                return $file->getCTime();
            })
        ];
        return view('admin/new-company')->with($p);
    }

    public function createCompany(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:company'],
            'phone' => ['required', 'string', 'min:8', 'unique:company'],
            'address' => ['required', 'string']
        ]);

        $company = new Company;
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->phone = $request->get('phone');
        $company->address = $request->get('address');
        $company->status = "active";
        $company->post_id = $request->get('post_id');
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            Storage::disk('public')->put($logo->getClientOriginalName(),  File::get($logo));
            $company->logo = $logo->getClientOriginalName();
        } else {
            $company->logo = null;
        }

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
            'name' => ['required', 'string', 'max:191','unique:company,name,'.$id],
            'phone' => ['required', 'string', 'min:8'],
            'address' => ['required', 'string']
            ]);

        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->phone = $request->get('phone');
        $company->address = $request->get('address');
        $company->post_id = $request->get('post_id');
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            Storage::disk('public')->put($logo->getClientOriginalName(),  File::get($logo));
            $company->logo = $logo->getClientOriginalName();
        }

        try {
            $company->save();
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            "message" => "company info updated successfully."
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
