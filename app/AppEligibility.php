<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppEligibility extends Model
{
    protected $table = 'app_eligibilities';

    /*** APPLICANT MODEL RELATIONSHIP ***/
    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicant_id', 'id');
    }
}
