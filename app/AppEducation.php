<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppEducation extends Model
{
    protected $table = 'app_educations';

    /*** APPLICANT MODEL RELATIONSHIP ***/
    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicant_id', 'id');
    }
}
