<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';

    /*** RELATIONS ***/
    public function educations()
    {
        return $this->hasMany('App\AppEducation', 'applicant_id');
    }

    public function trainings()
    {
        return $this->hasMany('App\AppTraining', 'applicant_id');
    }

    public function experiences()
    {
        return $this->hasMany('App\AppExperience', 'applicant_id');
    }

    public function eligibilities()
    {
        return $this->hasMany('App\AppEligibility', 'applicant_id');
    }

    public function fileAttachments()
    {
        return $this->hasMany('App\AppFileAttachment', 'applicant_id');
    }
}
