<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all_user (Request $request) {

        $user = User::all();

        $context = [
            'data'=> $user
        ];
        return response()->json($context);
    }
}
