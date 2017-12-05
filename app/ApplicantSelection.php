<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantSelection extends Model
{
    protected $table = 'app_selections';

    /*** RELATIONS ***/
    public function position()
    {
        return $this->belongsTo('App\PosPosition', 'position_id', 'id');
    }

    public function applicantSelections()
    {
        return $this->hasMany('App\AppSelectionGroup', 'group_id');
    }
}
