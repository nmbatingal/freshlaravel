<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPosition extends Model
{
    protected $table = 'pos_positions';

    /*** RELATIONS ***/
    public function applicantSelections()
    {
        return $this->hasMany('App\ApplicantSelection', 'position_id');
    }
}
