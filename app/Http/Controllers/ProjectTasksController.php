<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectTask;
use App\Models\Project;

class ProjectTasksController extends Controller
{

    public function my_tasks()
    {
        $groups = Auth::user()->groups->pluck('id');
        $projects = Project::whereIn('group_id', $groups)->pluck('id');

        return response()->json([
            'items' => ProjectTask::whereIn('project_id', $projects)->with('project')->get()
        ]);
    }

    public function show($id)
    {
        return view('projects.task', ['task' => ProjectTask::find($id)]);
    }
    
    public function edit($id)
    {
        return view('tasks._edit-task', ['task' => ProjectTask::find($id)]);
    }

    public function update_status($id, Request $request)
    {
        $project_task = ProjectTask::find($id);
        
        if(!$project_task)
            return response('false', 200);

        $project_task->status_id = $request->input('status_id');
        
        $project_task->completion_date = in_array($request->input('status_id') , [4, 5]) ? 
            ($project_task->completion_date == null && $request->input('status_id') == 4 ? date('Y-m-d H:i:s') : 
            $project_task->completion_date) 
        : null;

        if($project_task->save())
            return response('true', 200);
        
        return response('false', 200);
        
    }

    public function store(Request $request)
    {
        $id = $request->input('id');

        if($id)
            $project_task = ProjectTask::find($id);
        else
            $project_task = new ProjectTask;

        $project_task->name = trim(htmlspecialchars($request->input('name')));
        $project_task->due_date = trim(htmlspecialchars($request->input('due_date')));
        $project_task->description = trim(htmlspecialchars($request->input('description')));
        $project_task->completion_date = null;
        $project_task->status_id = 1;
        $project_task->project_id  = $request->input('project_id');
        $project_task->save();

        return response('true', 200);
    }

    public function delete($id)
    {
        $project_task = ProjectTask::find($id);

        if($project_task)
            $project_task->delete();
        else
            return response('false', 200);
        
        return response('true', 200);
    }
}
