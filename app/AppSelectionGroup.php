<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSelectionGroup extends Model
{
    protected $table = 'app_selection_groups';

    /*** RELATIONS ***/
    public function selectionGroup()
    {
        return $this->belongsTo('App\ApplicantSelection', 'group_id', 'id');
    }

    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicant_id', 'id');
    }
}
