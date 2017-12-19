<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant as Applicant;
use App\User as User;
use App\PosPosition as Position;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants     = Applicant::all();
        $users          = User::all();
        $positions      = Position::all();
        return view('home', compact('applicants', 'users', 'positions'));
    }
}
