<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <!DOCTYPE html>
<html>
<title>CustCare</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
.cd {
    cursor: pointer;
}
.cd:hover {
    transform: scaleY(1.1);
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">CustCare</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">REACH US</a>
      <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a>
      <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> WORK</a>
      <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> PRICING</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>
@if(session('info'))
    <div class="text-center col-md-4 m-auto fixed-top" style="z-index: 1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('info')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>    
@elseif(session('err'))
    <div class="text-center col-md-4 m-auto fixed-top" style="z-index: 1">
        <div class="alert alert-danger alert-dismissible show" role="alert">
        {{session('err')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
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
<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div id="complain" class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Welcome to Moruwasa customerCare</span><br>
    <span class="w3-large">Do you have any complain? click the button and submit it to us.</span>
    <p><a class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off" 
         data-toggle="modal" data-target="#exampleModal">Write your complain</a></p>
  </div> 
  
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
    <h3 class="w3-center">OTHER WAY ROUND</h3>
    <p class="w3-center w3-large">You can submit your complain througy the following ways</p>
    <div class="container">
        <div class="w3-center row" style="margin-top:64px">
            <div class="col-md-4 cd mb-3">
                <div class="w3-card">
                    <div class="w3-container p-5">
                        <h3>Visiting our Office</h3>
                        <p class="w3-opacity">Zone Offices</p>
                        <p>Wherever you are in morogoro, you can visit our office near you and submit your complain.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 cd mb-3">
                <div class="w3-card">
                    <div class="w3-container p-5">
                        <h3>Email address</h3>
                        <p class="w3-opacity"><a href="mailto:moruwasa@example.com" class="text-mutted">moruwasa@example.com</a></p>
                        <p>You can also reach us though our email anytime you fill that something is not right.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 cd mb-3">
                <div class="w3-card">
                    <div class="w3-container p-5">
                        <h3>Mobile Phone</h3>
                        <p class="w3-opacity">+255222743222</p>
                        <p>Incase of any delay, you can contact the HQ directly through our phone number.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <div class="col-md-6">
        <h3>We are always here for you.</h3>
        <p>To us, a customer is like a <strong class="text-warning">King</strong>, we value you and always ensuring that you get the better water services.</p>
        <p>Incase you have any issue, feal free to tell us and we will address it as quick as possible.</p>
        <p><a href="#complain" class="w3-button w3-black"><i class="fa fa-th"> </i> What is not right?</a></p>
      </div>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="{{('assets/image2.jpeg')}}" alt="Buildings" width="700" height="394">
    </div>
  </div>
</div>

<div id="team"></div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="row w3-grayscale d-flex justify-content-center" style="margin-top:64px">
            <div class="col-md-3 m6 w3-margin-bottom">
                <div class="w3-card col-md-12">
                    <img src="https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg" alt="John" style="width:100%">
                    <div class="w3-container text-center">
                    <h3>Zone 1</h3>
                    <p class="w3-opacity">Agent: Yanga Mbiwa</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m6 w3-margin-bottom">
                <div class="w3-card col-md-12">
                    <img src="https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg" alt="Jane" style="width:100%">
                    <div class="w3-container text-center">
                    <h3>Zone 2</h3>
                    <p class="w3-opacity">Agent: Mzee Wakazi</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m6 w3-margin-bottom">
                <div class="w3-card col-md-12">
                    <img src="https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg" alt="Dan" style="width:100%">
                    <div class="w3-container text-center">
                    <h3>Zone 3</h3>
                    <p class="w3-opacity">Agent: Pius Kware</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row w3-grayscale d-flex justify-content-center" style="margin-top:64px">
            <div class="col-md-3 m6 w3-margin-bottom">
                <div class="w3-card col-md-12">
                    <img src="https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg" alt="John" style="width:100%">
                    <div class="w3-container text-center">
                    <h3>Zone 4</h3>
                    <p class="w3-opacity">Agent: Machumu Fred</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m6 w3-margin-bottom">
                <div class="w3-card col-md-12">
                    <img src="https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg" alt="Jane" style="width:100%">
                    <div class="w3-container text-center">
                    <h3>Zone 5</h3>
                    <p class="w3-opacity">Agent: Onyango Yoruba</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m6 w3-margin-bottom">
            <div class="w3-card col-md-12">
                <img src="https://images.fineartamerica.com/images-medium-large-5/blurred-waterfall-ivan-slosar.jpg" alt="Dan" style="width:100%">
                <div class="w3-container text-center">
                <h3>Zone 6</h3>
                <p class="w3-opacity">Agent: Paul Mandala</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                </div>
            </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <div class="badge badge-primary p-5" style="border-radius: 50%">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </div>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <div class="badge badge-primary p-5" style="border-radius: 50%">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </div>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Write your complain</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ url('/send_complaint') }}">
             @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                            required autocomplete="name" autofocus placeholder="Your name *">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control @error('meter_no') is-invalid @enderror" name="meter_no" value="{{ old('meter_no') }}" 
                            required autocomplete="meter_no" autofocus placeholder="Your meter number *">

                        @error('meter_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label>Account Number</label>
                        <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" 
                        value="{{ old('account_number') }}" autocomplete="account_number" placeholder="Account Number *" >

                        @error('account_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Phone *</label>
                        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+255123456789">
                        
                        @error('phone')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>  
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label class="info-text"> Select the zone *</label>
                            <select name="zone" id="zone" class="form-control">
                                <option value=""> select.. </option>
                                <option value="mazimbu"> Mazimbu </option>
                                <option value="sabasaba">Sabasaba</option>
                                <option value="msanvu"> Msanvu</option>
                                <option value="mindu"> Mindu</option>
                                <option value="boma"> Boma</option>
                                <option value="kihonda"> Kihonda</option>
                            </select>
                        <div class="custom-control-input  @error('zone') is-invalid @enderror col-md-6"></div>
                        @error('zone')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="info-text">Complaint Type *</label>
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
                <div class="form-row mt-3">
                    <div class="col-md-12">
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" 
                        autocomplete="description" autofocus placeholder="Problem Description" rows="4" cols="50"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label class="info-text">Reported via </label>
                            <select name="report_medium" class="form-control">
                                <option value="website" selected>Website</option>
                            </select>
                            
                            <div class="custom-control-input  @error('report_medium') is-invalid @enderror col-md-6"></div>
                        @error('report_medium')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="info-text"> Select the Priority *</label>
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
            </div>
        
            <div class="modal-footer d-flex justify-content-between">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">cancel</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary w-100">Submit</>
                    </div>
            </div>
            <div class="text-center">
                <h5 class="text-muted">Note:</h5> <span class="text-danger"><strong>This is only for valid customers</strong></span>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Pricing Section -->
<!-- <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>PRICING</h3>
  <p class="w3-large">Choose a pricing plan that fits your needs.</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
        <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 10</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-red w3-xlarge w3-padding-48">Pro</li>
        <li class="w3-padding-16"><b>25GB</b> Storage</li>
        <li class="w3-padding-16"><b>25</b> Emails</li>
        <li class="w3-padding-16"><b>25</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 25</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
        <li class="w3-padding-16"><b>50GB</b> Storage</li>
        <li class="w3-padding-16"><b>50</b> Emails</li>
        <li class="w3-padding-16"><b>50</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 50</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
</div> -->

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">#moruwasa</a></p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
