<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppExperience extends Model
{
    protected $table = 'app_experiences';

    /*** APPLICANT MODEL RELATIONSHIP ***/
    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicant_id', 'id');
    }
}
