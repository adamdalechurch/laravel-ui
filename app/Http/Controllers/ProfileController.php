<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function my_profile(){
        return response()->json([
            'profile' => Auth::user()
        ]);
    }

    public function users(){
        return response()->json([
            'items' => User::get()
        ]);
    }
}
