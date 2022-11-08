<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\UserGroup;
use App\Models\User;

class GroupsController extends Controller
{

    public function my_groups()
    {
        return response()->json([
            'items' => Group::whereIn('id', Auth::user()->groups->pluck('id'))->with('owner')->get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'item' => Group::where('id', '=', $id)
                ->with('projects')
                ->with('projects.group')
                ->with('projects.tasks')
                ->with('users')
                ->first()
        ]);
    }

    public function edit($id)
    {
        return view('groups._edit-group', ['group' => Group::find($id)]);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');

        if($id)
            $group = Group::find($id);
        else
            $group = new Group;

        $group->name = trim(htmlspecialchars($request->input('name')));
        $group->user_id = Auth::user()->id;
        $group->save();

        if(!$id)
        {
            $user_group = new UserGroup;
            $user_group->user_id = Auth::user()->id;
            $user_group->group_id = $group->id;
            $user_group->save();
        }

        return response()->json([
            'item' => Group::where('id', '=', $group->id)
                ->with('owner')
                ->first()
        ]);
    }

    public function delete($id)
    {
        $group = Group::find($id);

        if($group)
            $group->delete();
        else
            return response('false', 200);

        return response('true', 200);
    }

    public function add_user(Request $request)
    {
        $group_user = UserGroup::where('group_id', '=', $request->input('group_id'))
            ->where('user_id', '=', $request->input('user_id'))
            ->first();

        if(!$group_user)
        {
            $group_user = new UserGroup;
            $group_user->user_id = $request->input('user_id');
            $group_user->group_id = $request->input('group_id');
            $group_user->save();
        }

        return response()->json([
            'item' => User::where('id', '=', $group_user->user_id)->first()
        ]);
    }
    
    public function delete_user($group_id, $user_id)
    {
        $group_user = UserGroup::where('group_id', '=', $group_id)
            ->where('user_id', '=', $user_id)
            ->first();
        
        return response(json_encode($group_user), 200);

        if($group_user)
            $group_user->delete();
        else
            return response('false', 200);

        return response('true', 200);
    }
}
