<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use App\Complaint;

class CustomerComplaintController extends Controller
{
    public function customerComplaint(Request $request){

        $client = new Client();
        $body['form_params'] = array('name'=>$request->input('name'), 'meter_no'=>$request->input('meter_no'));
        $response = $client->post('http://desolate-shelf-21097.herokuapp.com/customer', $body);

        $resp = $response->getBody(); 

        if($resp == '{"data":[404]}'){
            return back()->with("err", 'Your credentials does not match any of our records');
        }
         else {
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

            return back()->with("info", 'Your complaint has successful submited');
         }   
    }
}
