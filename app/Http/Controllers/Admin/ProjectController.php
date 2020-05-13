<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function renderArchiveProject()
    {
        $p = [
            'projects' => Project::all()
        ];

        return view('admin.archive-project')->with($p);
    }

    public function renderSingleProject($id)
    {
        $p = [
            'gallery' => collect(File::allFiles(public_path('uploads')))
                ->filter(function ($file) {
                    return in_array($file->getExtension(), ['png', 'gif', 'jpg']);
                })
                ->sortBy(function ($file) {
                    return $file->getCTime();
                }),
            'project' => Project::find($id)
        ];

        return view('admin.single-project')->with($p);
    }

    public function renderNewProject()
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

        return view('admin/new-project')->with($p);
    }

    public function createProject(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
            'gallery' => 'required'
        ]);

        $project = new Project;
        $project->name = $request->get('name');
        $project->excerpt = $request->get('excerpt');
        $project->content = $request->get('content');
        $project->thumbnail = $request->get('thumbnail');
        $project->gallery = json_decode($request->get("gallery"));

        try {
            $project->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "redirect" => url("admin/project/{$project->id}")
        ], 200);
    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
            'gallery' => 'required'
        ]);

        $project = Project::find($id);
        $project->name = $request->get('name');
        $project->excerpt = $request->get('excerpt');
        $project->content = $request->get('content');
        $project->thumbnail = $request->get('thumbnail');
        $project->gallery = json_decode($request->get("gallery"));

        try {
            $project->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "message" => "Project info updated successfully."
        ], 200);
    }

    public function deleteProject($id)
    {
        $project = Project::find($id);
        try {
            $project->status = "trashed";
            $project->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/project');
    }

    public function restoreProject($id)
    {
        $project = Project::find($id);
        try {
            $project->status = "publish";
            $project->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/project');
    }
}
