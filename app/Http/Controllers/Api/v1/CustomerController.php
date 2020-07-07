<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\TechResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Complaint;

class CustomerController extends Controller
{
    public function show($meter): TechResourceCollection
    {


            $data = new Complaint;
            $data = Complaint::join('technicians', 'complaints.id', '=', 'technicians.complaint_id')
                                ->where('meter_no', $meter)
                                ->select('complaints.name','meter_no','complaint_type','report_medium', DB::raw("CONCAT(technicians.fname,' ', technicians.lname) as Technicia_name"),
                                            'technicians.phone as technician_phone', 'complaints.status', 'technicians.updated_at as assigned_day')
                                ->get();

            return new TechResourceCollection($data);
    }
}
