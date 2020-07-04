<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use App\Technician;
use App\User;

class ComplaintController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        return view('complaints/complaints');
    }

    public function index(){
        $technicians = Technician::where('status', 'available')
                                ->where('zone', User::distinct('zone')->pluck('zone'))
                                ->get(); // getting all the technicians with no assigned tasks corresponding to the zone manager's zone
        $complaints = Complaint::where('status', 'new')
                                ->where('zone', User::distinct('zone')->pluck('zone'))
                                ->get(); // getting all the new complaint which have not addressed corresponding to the zone manager's zone
        return view('complaints/viewComplaints', ['complaints'=>$complaints, 'technicians'=>$technicians]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'account_number' => [ 'required','max:255'],
            'zone' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+255)[0-9]{9}$/', 'max:13'],
            'complaint_type' => ['required', 'string', 'max:50'],
            'report_medium' => ['required', 'string', 'max:255', ],
            'complaint_priority' => ['required', 'string', 'max:255',],
        ]);

        $complaints = new Complaint;

        $complaints->name = $request->input('name');
        $complaints->account_number = $request->input('account_number');
        $complaints->zone = $request->input('zone');
        $complaints->phone = $request->input('phone');
        $complaints->report_medium = $request->input('report_medium');
        $complaints->complaint_type = $request->input('complaint_type');
        $complaints->description = $request->input('description');
        $complaints->complaint_priority = $request->input('complaint_priority');

        $complaints->save();

        return redirect('/add_complaint')->with('info', 'complaint added successfully');
    }


    public function assignTask($id, Request $request){
        $validatedData = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
        ]);
        $technician = $request->input('fname');

        $tech_status = Technician::where('fname', $technician)->first();
        $tech_status->status = 'assigned';
        $tech_status->complaint_id = $id;
        $tech_status->save();

        $complaint = Complaint::where('id', $id)->first();
        $complaint->status = "assigned";

        if($complaint->complaint_priority == 'high'){
            $complaint->duration = '1';
        }
        elseif($complaint->complaint_priority == 'medium'){
            $complaint->duration = '2';
        }
        else{
            $complaint->duration = '3';
        }
        $complaint->save();
        return \redirect('/complaints')->with('info', 'task assigned successfully');
    }


    public function complaintStatus(){
        $complaints = Complaint::all();
        return view('complaints/complaintStatus', ['complaints'=>$complaints]);
    }
}
