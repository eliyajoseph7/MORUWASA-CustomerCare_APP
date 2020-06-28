<?php

namespace App\Http\Controllers\Charts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Complaint;

class ComplaintLocationController extends Controller
{
    public function getAllMonths()
    {
        $month_array = array();
        $complaints_dates = Complaint::distinct('zone')->orderBy('zone', 'ASC')->pluck('zone');
        $complaints_dates = json_decode($complaints_dates);

        if (! empty($complaints_dates)) {
            foreach ($complaints_dates as $zones) {
                $zone_name = $zones;
                $zone_array [] = $zone_name;
            }
        }
                            
        return $zone_array;
    }    

    public function getMonthlyComplaintCount($zone){
        $monthly_complaint_count = Complaint::whereYear('created_at', date('Y'))
                                            ->where('zone', $zone)                                
                                            ->get()->count('complaint_type');
        return($monthly_complaint_count);
    }

    public function getMonthlyComplaintLocation(){
        $monthly_complaint_count_array = array();
         $zone_array = $this->getAllMonths();
         $zone_name_array = array();

         if(! empty($zone_array)){
             foreach($zone_array as $zone_name){
                 $monthly_complaints_count = $this->getMonthlyComplaintCount($zone_name);
                 array_push($monthly_complaint_count_array, $monthly_complaints_count);
                 array_push($zone_name_array, $zone_name);
             }
              
         }
         $max_no = max($monthly_complaint_count_array);
         $max = round(( $max_no + 10/2 ) / 10 ) * 10;

         $monthly_complaint_data_array = array(
            'zone' => $zone_name_array,
            'complaint_count_data' => $monthly_complaint_count_array,
            'max' => $max
         );
    return $monthly_complaint_data_array;

    }

}
