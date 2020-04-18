<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>NEU Student Dashboard</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/css/carousel.css')}}">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/css/materializeModified/adminV2.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('assets/css/materializeModified/mdc.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('assets/css/materializeModified/c3.css')}}" rel="stylesheet">
  <style>
    footer {
    clear: both;
    position: relative;
    height: 100px;
    margin-top: -200px;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="{{url('https://www.neu.edu.ph/main/')}}" target="_blank">
          <strong class="blue-text">NEU</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="{{url('/home')}}">{{Auth::user()->name}}
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            {{-- <li class="nav-item">
              <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li> --}}
            <li class="nav-item">
          
              <a href="{{ route('logout') }}" class="nav-link border border-light rounded waves-effect"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      {{ __('LOG OUT') }}
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect" style="margin-bottom:-20px" >
        <h2 style="text-transform:uppercase" >{{Auth::user()->level['access_level']}}</h2>
      </a>

      <div class="list-group list-group-flush">
      
        <a href="#" class="list-group-item active waves-effect">
         Dashboard
        </a>
        @if(Auth::user()->register['Created_by'] == ''   )
          <a class="list-group-item list-group-item-action waves-effect" href="{{url('/student_register')}}"> Pre-register</a>
        @endif
        @foreach($checker as $chck)
          @if(Auth::user()->id == $chck->Created_by)
            <a target="_blank" class="list-group-item list-group-item-action waves-effect"  href="{{url('/student_register/'.$chck->enrollID)}}">Print Registration Form</a>
          @endif
        @endforeach
        @if(Auth::user()->register['Created_by'] == '')
         <a href="#" class="list-group-item list-group-item-action waves-effect"></a>
        @else
        <a href="{{url('/schedule_exam')}}" class="list-group-item list-group-item-action waves-effect">
          Schedule Exam</a>
        @endif
        @can('isAdmin')
        <a class="list-group-item list-group-item-action waves-effect" href="{{url('/admin')}}">ADMIN DASHBOARD</a>
        @elsecan('isStaff')
        <a class="list-group-item list-group-item-action waves-effect" href="{{url('/admin')}}">ADMIN DASHBOARD</a>
        @endcan
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
        
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="#" target="_blank">Welcome {{Auth::user()->level['access_level']}}</a>
          </h4>
          {{-- @if($errors->any())
          <h4 class="mb-2 mb-sm-0 pt-1" >{{$errors->first()}}</h4>
          @endif --}}
        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Other information</div>

            <!--Card content-->
            <div class="card-body">

             <table class="table table-hover" >
          
               <tbody>
                @foreach($checker as $chck)
                  @if(Auth::user()->id == $chck->Created_by)
                  <tr class="blue-grey lighten-4" >
                    <td>Date of exam </td>
                    <td>{{$chck->scheds['student_sched']}}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    @if($chck->scheds['status'] == "accept")
                    <td> <span class="badge badge-success" >ACCEPTED</span> </td>
                    @elseif($chck->scheds['status'] == "pending")
                    <td><span class="badge badge-warning" >PENDING</span></td>
                    @else
                    <td><span class="badge badge-warning" >Please select date of exam</span></td>
                    @endif
                  </tr>
                    @if($chck->scheds['id'] > 0 )
                      <tr>
                        <td>Transaction No:</td>
                        <td>{{$chck->scheds['title']}}</td>
                      </tr>
                    @else
                      <tr>
                        <td>Transaction No:</td>
                        <td>Transaction number unavailable</td>
                      </tr>
                    @endif
                  @endif
                @endforeach
               </tbody>
             </table>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
    
        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Basic Information</div>

            <!--Card content-->
            <div class="card-body">
              
              <table class="table table-hover" >
                <thead class="blue-grey lighten-4" >
                  @foreach($checker as $chck)
                  @if(Auth::user()->id == $chck->Created_by)
                  <tr>
                    <th>{{$chck->lname.', '.$chck->fname.' '.$chck->mname}}</th>
                    <th></th>
                  </tr>
                  </thead>
                 <tbody>
                
                    <tr>
                      <td>Gender: {{$chck->gender}} </td>
                      <td>Date of Birth: {{$chck->dob}}</td>
                    </tr>
                    <tr>
                      <td>Age: {{$chck->age}}</td>
                      <td>Nationality: {{$chck->Nationality}}</td>
                    </tr>
                    
                    @endif
                  @endforeach
                 </tbody>
               </table>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <div class="col-lg-12 col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Actions board</div>

            <!--Card content-->
            <div class="card-body">

             <table class="table table-hover" >
              <thead class="blue-grey lighten-4" >
                <tr>
                  <th>Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
               <tbody>
                @foreach($checker as $chck)
                  @if(Auth::user()->id == $chck->Created_by)
                    @if($chck->scheds['id'] > 0 )
                    <tr>
                      <td>Generate ID</td>
                      <td>
                        <a target="_blank" class="btn  btn-cyan " href="{{url('/student_register/temp_id/'.$chck->enrollID)}}">Generate</a>
                      </td>
                    </tr>
                    @else
                    <tr>
                      <td>Generate ID</td>
                      <td>Please select date of exam</td>
                    </tr>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data" >
                      @csrf
                      <tr>
                        <td>Upload File</td>
                        <td><input type="file" name="file" >

                         <input type="submit" value="submit"> </td>
                      </tr>
                      @if ($errors->has('file'))
                        <strong style="color: red" >You have not uploaded a file</strong>
                      @endif
                    </form>
                    <tr>
                      <td>UPLOADS</td>
                      @if(Auth::user()->upFiles['Created_by']>0)
                      <td>
                        @foreach($file as $f)
                          @if(Auth::user()->id == $f->Created_by)
                            <a target="_blank"  href="{{url('/upload/'.$f->id)}}" class="btn btn-small btn-blue-grey" >{{$f->file}}</a> 
                          @endif 
                        @endforeach
                      </td>
                      @else
                      <td>NO FILES UPLOADED</td>
                      @endif
                    </tr>
                  @endif
                @endforeach
               </tbody>
             </table>

            </div>

          </div>
          <!--/.Card-->

        </div>
      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->


            <!--Card content-->
         

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/codepen2.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/js/codepen.js')}}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

</body>

</html>
