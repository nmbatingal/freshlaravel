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
        $lineup   = new Selection();

        $lineup->date_interview = $request['date_interview'];
        $lineup->position_id    = $request['position_title'];
        $lineup->status         = 0;
        $lineup->save();

        foreach ($request->applicant_id as $applicant) {
            $grouping               = new Group();
            $grouping->applicant_id = $applicant;
            $grouping->selectionGroup()->associate($lineup);
            $grouping->save();
        }

        return redirect('/applicants/lineup')->with('info', 'Line-up Saved Successfully!');
    }

    public function view($id) {
        $selection = Selection::find($id);
        $group     = Group::where('group_id', $id)->get();

        return view('lineup.view', compact('selection', 'group'));
    }

    public function print($id) {
        $selection = Selection::find($id);
        $group     = Group::where('group_id', $id)->get();

        return view('lineup.print', compact('selection', 'group'));
    }

    public function destroy($id) {
        $data      = false;
        $selection = Selection::find($id);

        if ($selection->delete()) { $data = true; }

        return response()->json($data);
    }
}
