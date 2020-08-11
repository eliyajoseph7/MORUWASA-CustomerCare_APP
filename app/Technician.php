<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    //

    public function complaints(){
        return $this->belongsTo(Complaint::class);
    }
}
