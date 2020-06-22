@extends('constants.headerAndSide')

@section('content')
@if(session('info'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('info')}}.
    </div>
@endif
@if ($errors->any()) 
      <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
@endif

<section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New complaints</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover ">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Account Number</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Complaint Type</th>
                    <th>Reported Via</th>
                    <th>Complaint Priority</th>
                    <th>Complaint Description</th>
                    <th>Status</th>
                    <th>Date reported</th>
                    <th>Technician assigned</th>
                </tr>
                </thead>
                <tbody>
                @if(count($complaints ?? '') > 0)   
                    @foreach($complaints ?? ''->all() as $complaint) 
                <tr>
                    <td>{{ ($complaint->name) }}</td>
                    <td>{{ ($complaint->account_number) }}</td>
                    <td>{{ ($complaint->location) }}</td>
                    <td>{{ ($complaint->phone) }}</td>
                    <td>{{ ($complaint->complaint_type) }}</td>
                    <td>{{ ($complaint->report_medium) }}</td>
                    <td>{{ ($complaint->complaint_priority) }}</td>
                    @if($complaint->description !== null)
                        <td>{{ ($complaint->description) }}</td>
                    @else
                        <td>-</td>
                    @endif
                    @if($complaint->status == 'new')
                        <td><a  class="inline-flex float-left bg-maroon-active badge badge-danger">not addressed</a></td>
                    @elseif($complaint->status == 'completed')
                        <td><a  class="inline-flex float-left bg-green-active badge badge-success">completed</a></td>
                    @else
                        <td><a  class="inline-flex float-left bg-blue-active badge badge-danger">in progress</a></td>
                    @endif
                    <td>{{ ($complaint->created_at)->format(date('d/m/y')) }}</td>
                    @if(($complaint->technician) !== null)
                            <td><a  class="text-muted">{{($complaint->technician->fname)}} {{($complaint->technician->lname)}}</a></td>
                    @else
                            <td><a  class="inline-flex float-left bg-blue-active badge badge-danger">-</a></td>
                        
                    @endif    
                </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Customer Name</th>
                    <th>Account Number</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Complaint Type</th>
                    <th>Reported Via</th>
                    <th>Complaint Priority</th>
                    <th>Complaint Description</th>
                    <th>Status</th>
                    <th>Date reported</th>
                    <th>Technician assigned</th>
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