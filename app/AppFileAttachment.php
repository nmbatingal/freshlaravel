<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppFileAttachment extends Model
{
    protected $table = 'file_attachments';

    /*** APPLICANT MODEL RELATIONSHIP ***/
    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicant_id', 'id');
    }
}
