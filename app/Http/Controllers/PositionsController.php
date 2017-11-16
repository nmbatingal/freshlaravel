<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PosPosition as Position;

class PositionsController extends Controller
{
    public function index() {

        $position = Position::all();
        return view('position.index', compact('applicants'));
    }
}
