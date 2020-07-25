<?php

namespace App\Http\Controllers\Api\v1;

use App\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BillComplaintsController extends Controller
{
    public function index(): ResourceCollection
    {
        $bill_complaints = Complaint::where('complaint_type', 'high bill')->get();

        return new ResourceCollection($bill_complaints);
    }
}
