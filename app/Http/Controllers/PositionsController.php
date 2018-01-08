<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\PosPosition as Position;
use App\PosPublication as Publication;
use App\PosItem as Item;
use App\PosQualification as Qualification;

class PositionsController extends Controller
{
    public function index() {

        $positions = Position::orderBy('created_at', 'DESC')->get();
        return view('position.index', compact('positions'));
    }

    public function create(Request $request) {

        $position      = new Position();
        $qualification = new Qualification();

        $position->title     = $request['title'];
        $position->acronym   = $request['acronym'] ?: NULL;
        $position->sal_grade = $request['sal_grade'] ?: NULL;
        $position->save();

        $publications = $request['publication_no'];
        if ( !empty($publications) ) {
            $publication   = new Publication();
            $publication->publication_no = $publications;
            $publication->timestamps = false;
            $publication->position()->associate($position);
            $publication->save();
        }

        $items = $request['item_no'];
        if ( !empty($items) ) {
            $item   = new Item();
            $item->item_no = $items;
            $item->timestamps = false;
            $item->position()->associate($position);
            $item->save();
        }

        $qualification->education     = $request['education'];
        $qualification->experience    = $request['experience'];
        $qualification->trainings     = $request['trainings'];
        $qualification->eligibilities = $request['eligibilities'];
        $qualification->timestamps = false;
        $qualification->position()->associate($position);
        $qualification->save();

        return redirect('/positions')->with('info', 'Position Added Successfully!');
    }
}
