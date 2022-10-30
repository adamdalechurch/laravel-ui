<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\ProjectTask;

class DashboardController extends Controller
{
      /**
     * Display the dashboard view.
     * 
     * @return \Illuminate\View\View
     */
    public function get()
    {
        $user          = Auth::user();
        $projects      = Project::whereIn('group_id', $user->groups->pluck('id'));
        $open_projects = $projects->whereNull('completion_date');
        $tasks         = ProjectTask::whereIn('project_id', $projects->pluck('id'));
        $open_tasks    = $tasks->whereNull('completion_date');
        $progress      = 0;// $open_tasks == 0 ? 100 : $tasks->count() / $open_tasks;

        foreach($open_projects as $project)
            $progress += $project->progress_percent() / $open_projects->count();
            
        // return view('dashboard', [
        //     'user'          => $user,
        //     'open_projects' => $open_projects,
        //     'open_tasks'    => $open_tasks,
        //     'progress'      => $progress
        // ]);

        usleep(.5);
        
        return response()->json([
            'user'                => $user,
            'open_projects'       => $open_projects->with('tasks')->get(),
            'open_projects_count' => $open_projects->count(),
            'open_tasks'          => $open_tasks->get(),
            'open_tasks_count'    => $open_tasks->count(),
            'progress'            => $progress
        ]);
    }
}
