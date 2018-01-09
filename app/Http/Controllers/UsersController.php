<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as User;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
        //return response(view('users.index', compact('users')), 200, ['Content-Type' => 'application/json']);
    }
}
