<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function my_projects()
    {
        return response()->json([
            'items' => Project::whereIn('group_id', Auth::user()->groups->pluck('id'))->with('group')->with('tasks')->get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'item' =>  Project::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('projects._edit-project', ['project' => Project::find($id)]);
    }

    public function update_status($id, Request $request)
    {
        $project = Project::find($id);
        
        if(!$project)
            return response('false', 200);

        $project->status = $request->input('status');
        
        if($project->save())
            return response('true', 200);
        
        return response('false', 200);
        
    }

    public function store (Request $request)
    {
        $id = $request->input('id');

        if($id)
            $project = Project::find($id);
        else
            $project = new Project;

        $project->name = trim(htmlspecialchars($request->input('name')));
        $project->due_date = trim(htmlspecialchars($request->input('due_date')));
        $project->description = trim(htmlspecialchars($request->input('description')));
        $project->completion_date = null;
        $project->status_id = 1;
        $project->group_id  = $request->input('group_id');
        $project->user_id = Auth::user()->id;
        $project->save();

        // $group_project = new GroupProject;
        // $group_project->group_id = $request->input('group_id');
        // $group_project->project_id = $project->id;
        // $group_project->save();

        return response('true', 200);

    }

    public function delete($id)
    {
        $project = Project::find($id);

        if($project)
            $project->delete();
        else
            return response('false', 200);
        
        return response('true', 200);
    }
}
