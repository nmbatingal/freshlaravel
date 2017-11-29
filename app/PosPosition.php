<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPosition extends Model
{
    protected $table = 'pos_positions';

    /*** RELATIONS ***/
    public function publications()
    {
        return $this->hasMany('App\PosPublication', 'pos_id');
    }

    public function items()
    {
        return $this->hasMany('App\PosItem', 'pos_id');
    }

    public function qualifications()
    {
        return $this->hasMany('App\PosQualification', 'pos_id');
    }

    public function applicantSelections()
    {
        return $this->hasMany('App\ApplicantSelection', 'position_id');
    }
}
