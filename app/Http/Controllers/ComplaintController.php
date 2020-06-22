<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use App\Technician;

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
        $technicians = Technician::where('status', 'available')->get(); // getting all the technicians with no assigned tasks
        $complaints = Complaint::where('status', 'new')->get(); // getting all the new complaint which have not addressed
        return view('complaints/viewComplaints', ['complaints'=>$complaints, 'technicians'=>$technicians]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'account_number' => [ 'required','max:255'],
            'location' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+255)[0-9]{9}$/', 'max:13'],
            'complaint_type' => ['required', 'string', 'max:50'],
            'report_medium' => ['required', 'string', 'max:255', ],
            'complaint_priority' => ['required', 'string', 'max:255',],
        ]);

        $complaints = new Complaint;

        $complaints->name = $request->input('name');
        $complaints->account_number = $request->input('account_number');
        $complaints->location = $request->input('location');
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

        $complaint = Complaint::find($id)->first();
        $complaint->status = "assigned";
        $complaint->save();
        
        return \redirect('/complaints')->with('info', 'task assigned successfully');
    }


    public function complaintStatus(){
        $complaints = Complaint::all();
        return view('complaints/complaintStatus', ['complaints'=>$complaints]);
    }
}
