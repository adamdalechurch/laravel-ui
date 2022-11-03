<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function my_profile(){
        return response()->json([
            'profile' => Auth::user()
        ]);
    }
}
