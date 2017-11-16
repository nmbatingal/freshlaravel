<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ApplicantSelection as Selection;
use App\Applicant as Applicant;
use App\PosPosition as Position;
use App\AppSelectionGroup as Group;

class SelectionsController extends Controller
{
    public function index() {

        $applicants = Selection::all();
        return view('lineup.index', compact('applicants'));
    }

    public function createSelectionLine(Request $request) {
        $position = new Position();
        $lineup   = new Selection();

        $position->title   = $request['position_title'];
        $position->save();

        $lineup->position()->associate($position);
        $lineup->save();

        foreach ($request->applicant_id as $applicant) {
            $grouping               = new Group();
            $grouping->applicant_id = $applicant;
            $grouping->selectionGroup()->associate($lineup);
            $grouping->save();
        }

        return redirect('/lineup')->with('info', 'Line-up Saved Successfully!');
    }

    public function view($id) {
        $selections = Group::where('group_id', $id)->get();
        //$selections = $users = DB::table('app_selection_groups')->get();;
        return view('lineup.view', compact('selections'));
        //return $selections;
    }
}
