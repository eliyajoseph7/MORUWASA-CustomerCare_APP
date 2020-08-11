<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name',
            'zone',
            'phone',
            'complaint_type',
            'report_medium',
            'complaint_priority',
            'status',
            'duration',
            'description',
            'meter_no'
    ];

    public function technician(){
        return $this->hasOne(Technician::class);
    }
}
