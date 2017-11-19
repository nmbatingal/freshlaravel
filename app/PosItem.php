<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosItem extends Model
{
    protected $table = 'pos_items';
    protected $guarded = ['pos_id'];
    public $timestamps = false;

    /*** POS_POSITION MODEL RELATIONSHIP ***/
    public function position()
    {
        return $this->belongsTo('App\PosPosition', 'pos_id', 'id');
    }
}
