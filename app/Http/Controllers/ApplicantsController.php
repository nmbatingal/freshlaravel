<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Applicant as Applicant;
use App\AppEducation as Education;
use App\AppTraining as Training;
use App\AppExperience as Experience;
use App\AppEligibility as Eligibility;
use App\AppFileAttachment as FileAttach;

class ApplicantsController extends Controller
{
    public function index() {

        $applicants = Applicant::all();
        return view('applicants.index', compact('applicants'));
    }

    public function create(Request $request) {

        $applicant = new Applicant();

        $applicant->lastname   = $request['lastname'];
        $applicant->firstname  = $request['firstname'];
        $applicant->middlename = $request['middlename'] ?: NULL;
        $applicant->contact    = $request['contact-number'];
        $applicant->remarks    = $request['remarks'];
        $applicant->save();

        $educations = $request->education;
        if ( !empty($educations) ) {
            foreach ($educations['program'] as $i => $program) {
                $education             = new Education();
                $education->program    = $program;
                $education->school     = $educations['school'][$i];
                $education->year       = $educations['year'][$i];
                $education->applicant()->associate($applicant);
                $education->save();
            }
        }

        $trainings = $request->training;
        if ( !empty($trainings) ) {
            foreach ($trainings['title'] as $i => $title) {
                if ( $title ) {
                    $training               = new Training();
                    $training->title        = $title;
                    $training->conducted_by = $trainings['conducted_by'][$i];
                    $training->from_date    = $trainings['from_date'][$i] ?: NULL;
                    $training->to_date      = $trainings['to_date'][$i] ?: NULL;
                    $training->hours        = $trainings['hours'][$i] ?: NULL;
                    $training->applicant()->associate($applicant);
                    $training->save();
                }
            }
        }

        $experiences = $request->experience;
        if ( !empty($experiences) ) {
            foreach ($experiences['position'] as $i => $position) {
                if ( $title ) {
                    $experience               = new Experience();
                    $experience->position     = $position;
                    $experience->agency       = $experiences['agency'][$i];
                    $experience->salary       = $experiences['salary'][$i] ?: NULL;
                    $experience->appointment  = $experiences['appointment'][$i] ?: NULL;
                    // $experience->is_govt     = $experiences['is_govt'][$i] ?: NULL;
                    $experience->from_date    = $experiences['from_date'][$i] ?: NULL;
                    $experience->to_date      = $experiences['to_date'][$i] ?: NULL;
                    $experience->applicant()->associate($applicant);
                    $experience->save();
                }
            }
        }

        $eligibilities = $request->eligibility;
        if ( !empty($eligibilities) ) {
            foreach ($eligibilities['title'] as $i => $title) {
                if ( $title ) {
                    $eligibility             = new Eligibility();
                    $eligibility->title      = $title;
                    $eligibility->rating     = $eligibilities['rating'][$i] ?: NULL;
                    $eligibility->exam_date  = $eligibilities['exam_date'][$i] ?: NULL;
                    $eligibility->license_no = $eligibilities['license_no'][$i] ?: NULL;
                    $eligibility->applicant()->associate($applicant);
                    $eligibility->save();
                }
            }
        }

        foreach ($request->attachment as $file) {
            $filename           = $file->getClientOriginalName();
            $destinationPath    = 'upload/attachment/'.'applicant_'.$applicant['id'];       

            $file_att                = new FileAttach();
            $file_att->filename      = $filename;
            $file_att->path          = $destinationPath;
            $file_att->tab_name      = 'applicant';           
            $file->move($destinationPath, $filename);

            $file_att->applicant()->associate($applicant);
            $file_att->save();
        }

        // $url = url('/applicants');
        // return $url;
        return redirect('/applicants/list')->with('info', 'Applicant Information Saved Successfully!');
    }

    public function destroy($id) {

        $data = false;
        $applicant = Applicant::find($id);

        if ($applicant->delete()) { $data = true; }

        \File::deleteDirectory('upload/attachment/applicant_'.$id);

        // return redirect('/applicants')->with('info', 'Applicant Removed Successfully!');
        return response()->json($data);
    }
}
