<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\TechResource;
use Illuminate\Support\Facades\DB;
use App\Complaint;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($meter): TechResource
    {


            $data = new Complaint;
            $data = Complaint::join('technicians', 'complaints.id', '=', 'technicians.complaint_id')
                                ->where('meter_no', $meter)
                                ->select('complaints.name','meter_no','complaint_type','report_medium', DB::raw("CONCAT(technicians.fname,' ', technicians.lname) as Technicia_name"),
                                            'technicians.phone as technician_phone', 'complaints.status', 'complaints.created_at as submitted_day', 'technicians.updated_at as assigned_day')
                                ->get();
            if($data->isEmpty()){
                $data1 = Complaint::where('meter_no', $meter)
                                ->select('complaints.name','meter_no','complaint_type','report_medium',
                                         'complaints.status', 'complaints.created_at as submitted_day')
                                ->get();
                return new TechResource($data1);
            }else{
                return new TechResource($data);
            }

            
    }

    public function update($meter, Request $request): TechResource
    {
        $rating_input = $request->input('customer_rating');
        $rating_description = $request->input('rating_description');

        // return $rating_description;
        $comp = Complaint::where('meter_no', $meter)->where('status', 'completed')->first();
        $comp->customer_rating = $rating_input;
        $comp->rating_description = $rating_description;
        $comp->save();
        return new TechResource($comp);
    }
}
