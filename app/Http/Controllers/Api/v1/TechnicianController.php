<?php

namespace App\Http\Controllers\Api\v1;

use App\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Technician;
use App\Http\Resources\Resources\TechResource;

class TechnicianController extends Controller
{
    public function store(Request $request): TechResource
    {
        $request -> validate([
            'email'=> ['required', 'string', 'email', 'max:255'],
            'lname'=> 'required'
        ]);

        $email = $request->input('email');
        $lname = $request->input('lname');

        $check = Technician::where('email', $email)
                    ->whereRaw('lower(lname) = ? ', \strtolower($lname));
                    

        if ($check->exists()) {
            $token = Technician::where('phone', $check->pluck('phone'))->get('api_token');

            return new TechResource($token);
        } else {
            return new TechResource([404]);
        }
    }

    
    public function show($email): TechResource
    {

        $data = new Technician;
        $data = Technician::join('complaints', 'technicians.complaint_id', '=', 'complaints.id')
                        ->where('technicians.email', $email)
                        ->select('name as customer_name', 'complaints.phone as customer_phone','complaints.duration as task_duration', 
                        'complaints.zone as customer_location', 'complaint_type', 'complaints.description')
                        ->get();
        return new TechResource($data);
    }

    public function update($email, Request $request): TechResource
    {
        $request -> validate([
            'status'=> ['required', 'string'],
        ]);
        
        $status = $request->input('status');

        $change = new Technician;
        $change = Technician::where('email',$email)->first();

        //changing complaint status
        $comp = new Complaint;
        try {
            $comp = $comp::where('id', $change->complaint_id)
                                ->first();
            $comp->status = $status; // updating status to completed
            $comp->duration = null; // reset task duration to null
    
            $comp->save();
        } catch (\Throwable $th) {
            report($th);

            return new TechResource(['technician was not found' => 404]);
        }

        
        
        $change->status = 'available';
        // $change->complaint_id = null; // removing complaint relationship from technician table, 
                                        // if this is allowed, then we'll not be able
                                        //  to know in the future who did the task
        $change->save();
        return new TechResource($change);
    }
}