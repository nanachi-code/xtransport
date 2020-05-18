<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function renderArchiveProject()
    {
        $p = [
            'projects' => Project::where('status', 'publish')->paginate(12),
        ];
        return view('main.archive-project')->with($p);
    }

    public function renderSingleProject($id)
    {
        $p = [
            'project' => Project::find($id),
            "latestProjects" => Project::where("status", "publish")
                ->where('id', '!=', $id)
                ->take(3)
                ->get(),
        ];

        return view('main.single-project')->with($p);
    }
}
