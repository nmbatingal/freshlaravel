<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosPosition extends Model
{
    protected $table = 'pos_positions';

    /*** RELATIONS ***/
    public function publications()
    {
        return $this->hasMany('App\PosPosition', 'pos_id');
    }

    public function items()
    {
        return $this->hasMany('App\PosItem', 'pos_id');
    }

    public function qualifications()
    {
        return $this->hasMany('App\PosQualification', 'pos_id');
    }
}
