<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppTraining extends Model
{
    protected $table = 'app_trainings';

    /*** APPLICANT MODEL RELATIONSHIP ***/
    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicant_id', 'id');
    }
}
