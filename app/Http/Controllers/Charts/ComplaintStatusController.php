<?php

namespace App\Http\Controllers\Charts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Complaint;

class ComplaintStatusController extends Controller
{
    public function getAllMonths()
    {
        $month_array = array();
        $complaints_status = Complaint::distinct('status')->orderBy('status', 'ASC')->pluck('status');
        $complaints_status = json_decode($complaints_status);

        if (! empty($complaints_status)) {
            foreach ($complaints_status as $statuses) {
                $status_name = $statuses;
                $month_array [] = $status_name;
            }
        }
                            
        return $month_array;
    }    

    public function getMonthlyComplaintCount(){
        $monthly_complaint_count = Complaint::whereMonth('created_at', date('m'))->get()->count('status');
        return($monthly_complaint_count);
    }

    public function getMonthlyComplaintStatus(){
        $monthly_complaint_count_array = array();
         $month_array = $this->getAllMonths();
         $month_name_array = array();

         if(! empty($month_array)){
             foreach($month_array as $month_name){
                 $monthly_complaints_count = $this->getMonthlyComplaintCount();
                 array_push($monthly_complaint_count_array, $monthly_complaints_count);
                 array_push($month_name_array, $month_name);
             }
              
         }
         $max_no = max($monthly_complaint_count_array);
         $max = round(( $max_no + 10/2 ) / 10 ) * 10;

         $monthly_complaint_data_array = array(
            'status' => $month_name_array,
            'complaint_count_data' => $monthly_complaint_count_array,
            'max' => $max
         );
    return $monthly_complaint_data_array;

    }

}
