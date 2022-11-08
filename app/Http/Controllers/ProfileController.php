<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function my_profile(){
        return response()->json([
            'profile' => User::where('id', '=', Auth::user()->id)
                ->with('new_notifications')
                ->first()
        ]);
    }

    public function users(){
        return response()->json([
            'items' => User::get()
        ]);
    }
}
