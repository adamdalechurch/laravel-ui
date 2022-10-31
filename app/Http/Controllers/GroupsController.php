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
            'groups' => Auth::user()->groups
        ]);
    }

    public function show($id)
    {
        return view('groups.group', ['group' => Group::find($id)]);
    }

    public function update($id, Request $request)
    {
        $group = Group::find($id);
        $group->name = trim(htmlspecialchars($request->input('name')));
        $group->user_id = Auth::user()->id;
        $group->save();

        return redirect('/groups?success=Succesfully+updated+group!');
    }

    public function edit($id)
    {
        return view('groups._edit-group', ['group' => Group::find($id)]);
    }

    public function store(Request $request)
    {
        $group = new Group;
        $group->name = trim(htmlspecialchars($request->input('name')));
        $group->user_id = Auth::user()->id;
        $group->save();

        $user_group = new UserGroup;
        $user_group->user_id = Auth::user()->id;
        $user_group->group_id = $group->id;
        $user_group->save();

        return redirect('/groups');
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
