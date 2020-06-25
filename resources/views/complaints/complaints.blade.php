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

        <div class="col-lg-4">
            <div class="addUser"><a href="#" class="btn btn-primary">add complaint</a></div>

            <div class="box box-default" >
                <div class="col-xl-12 jumbotron">
                    <div class="card ">
                            <form method="POST" action="{{ url('/save_complaint') }}">
                                @csrf


                                <div class="form-group row mb-3">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                        required autocomplete="name" autofocus placeholder="Customer name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">

                                    <div class="col-md-6">
                                        <label>Account Number</label>
                                        <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" 
                                        value="{{ old('account_number') }}" autocomplete="account_number" placeholder="Account Number" >

                                        @error('account_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+255123456789">
                                        
                                        @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>                                    
                                </div>

                                <div class="form-group row mb-3">

                                    <div class="col-md-6">
                                        <h5 class="info-text"> Select the location </h5>
                                            <select name="location" id="location" class="form-control">
                                                <option value=""> select.. </option>
                                                <option value="mazimbu"> Mazimbu </option>
                                                <option value="sabasaba">Sabasaba</option>
                                                <option value="msanvu"> Msanvu</option>
                                                <option value="mindu"> Mindu</option>
                                                <option value="boma"> Boma</option>
                                                <option value="kihonda"> Kihonda</option>
                                            </select>
                                        <div class="custom-control-input  @error('location') is-invalid @enderror col-md-6"></div>
                                        @error('location')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="info-text"> Select the Complaint Type </h5>
                                            <select name="complaint_type" class="form-control">
                                                <option value="">select..</option>
                                                <option value="high_bill">High bills</option>
                                                <option value="no_water">No water service</option>
                                                <option value="meter_defaults">Meter defaults</option>
                                                <option value="leakage">Water leakage</option>
                                                <option value="">Others</option>
                                            </select>
                                            
                                            <div class="custom-control-input  @error('complaint_type') is-invalid @enderror col-md-6"></div>
                                        @error('complaint_type')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                <div class="form-group row mb-3">
                                    <div class="col-md-12">
                                        <input type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" 
                                        autocomplete="description" autofocus placeholder="Problem Description">

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <h5 class="info-text"> Select the Reported via </h5>
                                            <select name="report_medium" class="form-control">
                                                <option value="">select..</option>
                                                <option value="phone">Phone call</option>
                                                <option value="direct">Direct</option>
                                                <option value="website">Website</option>
                                            </select>
                                            
                                            <div class="custom-control-input  @error('report_medium') is-invalid @enderror col-md-6"></div>
                                        @error('report_medium')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="info-text"> Select the Priority </h5>
                                            <select name="complaint_priority" class="form-control">
                                                <option value="">select..</option>
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">low</option>
                                            </select>
                                            
                                            <div class="custom-control-input  @error('complaint_priority') is-invalid @enderror col-md-6"></div>
                                        @error('complaint_priority')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ">
            <div class="addUser"><a href="#" class="btn btn-primary">upload complaint</a></div>

            <div class="box box-default">
                <div class="col-xl-12 jumbotron">
                    <div class="card ">
                            <form method="POST" action="{{ url('/addUser') }}">
                                @csrf


                                <div class="form-group row mb-3">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" 
                                        required autocomplete="fname" autofocus placeholder="First name">

                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">

                                    <div class="col-md-6 margin-bottom">
                                        <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" 
                                        value="{{ old('mname') }}" autocomplete="mname" placeholder="Middle name" >

                                        @error('mname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname"
                                            value="{{ old('lname') }}" required autocomplete="lname" placeholder="Last name">

                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+255123456789">
                                        
                                        @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" required placeholder="Smith...">
                                        
                                        @error('username')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">

                                    <div class="col-md-6">
                                        <h5 class="info-text"> Select the role </h5>
                                            <select name="role" id="role" class="form-control">
                                                <option value=""> select.. </option>
                                                <option value="admin"> Admin </option>
                                                <option value="agent"> Customer care agent </option>
                                                <option value="manager"> Zone manager </option>
                                            </select>
                                        <div class="custom-control-input  @error('role') is-invalid @enderror col-md-6"></div>
                                        @error('role')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                    <h5 class="info-text"> Select the Gender </h5>
                                            <select name="gender" class="form-control">
                                                <option value=""> choose.. </option>
                                                <option value="m"> Male </option>
                                                <option value="f"> Female </option>
                                            </select>
                                            
                                            <div class="custom-control-input  @error('gender') is-invalid @enderror col-md-6"></div>
                                        @error('gender')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-6 margin-bottom">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required autocomplete="new-password"  placeholder="confirm password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

@endsection