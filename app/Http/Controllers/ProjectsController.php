<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function my_projects()
    {
        return view('projects.my-projects', ['projects' => Project::whereIn('group_id', Auth::user()->groups->pluck('id'))->get()]);
    }

    public function show($id)
    {
        return view('projects.project', ['project' => Project::find($id)]);
    }

    public function edit($id)
    {
        return view('projects._edit-project', ['project' => Project::find($id)]);
    }

    public function update($id, Request $request)
    {
        $project = Project::find($id);
        $project->name = trim(htmlspecialchars($request->input('name')));
        $project->due_date = trim(htmlspecialchars($request->input('due_date')));
        $project->description = trim(htmlspecialchars($request->input('description')));
        $project->completion_date = null;
        $project->group_id  = $request->input('group_id');
        //$project->status_id = $request->input('status_id');
        $project->user_id = Auth::user()->id;
        $project->save();
        return redirect('/groups/' . $request->input('group_id') . "?success=Succesfully+updated+project!");
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

        return redirect('/groups/' . $request->input('group_id') . "?success=Succesfully+added+project!");

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
