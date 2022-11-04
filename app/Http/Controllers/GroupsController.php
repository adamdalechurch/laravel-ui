<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\UserGroup;

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
            'item' => Group::find($id)
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
        
        return response('true', 200);
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
}
