@extends('constants.headerAndSide')

@section('content')

    <!-- Main content -->

      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Total Complaints in each Month</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="dataChart" style="height: 46px; width: 116px;" height="46" width="116"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Complaints Stauses</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="statusChart" style="height: 300px; padding: 0px; position: relative;"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Total monthly complaints based on zones</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="complaintLocation" style="height: 46px; width: 116px;" height="46" width="116"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height: 42px; width: 116px;" height="42" width="116"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->


      <section class="content">
      <div class="row">
        <div class="col-xl-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Zone</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Customer category</th>
                    <th>Customer Meter</th>
                    <th>Meter Type</th>
                </tr>
                </thead>
                <tbody>
                @if(count($resp ?? '') > 0)   
                    @foreach($resp ?? ''->all() as $resp) 
                <tr>
                    <td>{{ ($resp->name) }}</td>
                    <td>{{ ($resp->street) }}</td>
                    <td>{{ ($resp->gender) }}</td>
                    <td>{{ ($resp->phone) }}</td>
                    <td>{{ ($resp->category) }}</td>
                    <td>{{ ($resp->meter_no) }}</td>
                    <td>{{ ($resp->type) }}</td>   
                </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Zone</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Customer category</th>
                    <th>Customer Meter</th>
                    <th>Meter Type</th>
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
