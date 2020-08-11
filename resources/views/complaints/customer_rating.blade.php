@extends('constants.headerAndSide')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-xl-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New complaints</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Meter Number</th>
                    <th>Zone</th>
                    <th>Complaint Type</th>
                    <th>Complaint Description</th>
                    <th>Technician</th>
                    <th>customer Rating</th>
                    <th>Complaint Status</th>
                </tr>
                </thead>
                <tbody>
                @if(count($ratings ?? '') > 0)   
                    @foreach($ratings ?? ''->all() as $rating) 
                <tr>
                    <td>{{ ($rating->name) }}</td>
                    <td>{{ ($rating->meter_no) }}</td>
                    <td>{{ ($rating->zone) }}</td>
                    <td>{{ ($rating->complaint_type) }}</td>
                    @if($rating->description !== null)
                        <td>{{ ($rating->description) }}</td>
                    @else
                        <td>no description</td>
                    @endif
                    <td>{{ ($rating->technician->fname) }} {{ ($rating->technician->lname) }}</td>
                    @if($rating ->customer_rating == 5) 
                    <td>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                    </td>
                    @elseif($rating ->customer_rating == 4) 
                    <td>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x"></i>
                    </td>
                    @elseif($rating ->customer_rating == 3) 
                    <td>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                    </td>
                    @elseif($rating ->customer_rating == 2) 
                    <td>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x text-danger"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                    </td> 
                    @else($rating ->customer_rating == 1) 
                    <td>
                         <i class="fa fa-star fa-2x text-danger"></i>
                         <i class="fa fa-star fa-2x"></i>
                         <i class="fa fa-star fa-2x"></i>
                         <i class="fa fa-star fa-2x"></i>
                         <i class="fa fa-star fa-2x"></i>
                    </td>
                    @endif
                    <td >
                    {{ ($rating->status) }} <i class="fa fa-check text-success"></i>
                    </td>
                    
                </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Customer Name</th>
                    <th>Meter Number</th>
                    <th>Zone</th>
                    <th>Complaint Type</th>
                    <th>Complaint Description</th>
                    <th>Technician</th>
                    <th>customer Rating</th>
                    <th>Complaint Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
      </div>
      <!-- /.row -->

      
    </section>

@endsection