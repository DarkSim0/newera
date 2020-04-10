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
          @if($errors->any())
          <h4 class="mb-2 mb-sm-0 pt-1" >{{$errors->first()}}</h4>
          @endif
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
              <thead class="blue-grey lighten-4" >
                <tr>
                  <th>Exam details</th>
                  <th></th>
                </tr>
              </thead>
               <tbody>
                @foreach($checker as $chck)
                  @if(Auth::user()->id == $chck->Created_by)
                  <tr>
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
                      <td><a target="_blank" href="{{url('/student_register/temp_id/'.$chck->enrollID)}}"><span class="badge badge-warning" >Generate</span></a></td>
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
                    </form>
                    <tr>
                      <td>UPLOADS</td>
                      <td>{{Auth::user()->upfiles['files']}}</td>
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

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Section: Modals-->
            {{-- <section>

              <!-- Frame Modal Top Info-->
              <div class="modal fade top" id="frameModalTopInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                      <div class="row d-flex justify-content-center align-items-center">

                        <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit. Impedit nisi quo
                          provident fugiat reprehenderit nostrum quos..</p>

                        <a role="button" class="btn btn-info">Get it now
                          <i class="far fa-gem ml-1"></i>
                        </a>
                        <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                          thanks</a>
                      </div>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Frame Modal Bottom Success-->

              <!-- Frame Modal Bottom Success-->
              <div class="modal fade bottom" id="frameModalBottomSuccessDemo" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-frame modal-bottom modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                      <div class="row d-flex justify-content-center align-items-center">

                        <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit. Impedit nisi quo
                          provident fugiat reprehenderit nostrum quos..</p>

                        <a role="button" class="btn btn-success">Get it now
                          <i class="far fa-gem ml-1"></i>
                        </a>
                        <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
                      </div>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Frame Modal Bottom Success-->

              <!-- Side Modal Top Right Success-->
              <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-success">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Top Right Success-->

              <!-- Side Modal Top Left Info-->
              <div class="modal fade left" id="sideModalTLInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-top-left modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Info</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg" alt="Material Design for Bootstrap - dashboard"
                        class="img-fluid">

                      <div class="text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                          vero illo
                          error eveniet cum.
                        </p>
                      </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-info">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Top Left Info-->

              <!-- Side Modal Bottom Right Danger-->
              <div class="modal fade right" id="sideModalBRDangerDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading">Modal Danger</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-3">
                          <p></p>
                          <p class="text-center">
                            <i class="fas fa-shopping-cart fa-4x"></i>
                          </p>
                        </div>

                        <div class="col-9">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,
                            molestiae
                            provident temporibus sunt earum.</p>
                          <h2>
                            <span class="badge">v52gs1</span>
                          </h2>
                        </div>
                      </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-danger">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Bottom Right Danger-->

              <!-- Side Modal Bottom Left Warning-->
              <div class="modal fade left" id="sideModalBLWarningDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-bottom-left modal-notify modal-warning" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading">Modal Warning</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-3 text-center">
                          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" alt="Michal Szymanski - founder of Material Design for Bootstrap"
                            class="img-fluid z-depth-1-half rounded-circle">
                          <div style="height: 10px"></div>
                          <p class="title mb-0">Jane</p>
                          <p class="text-muted " style="font-size: 13px">Consultant</p>
                        </div>

                        <div class="col-9">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,
                            molestiae
                            provident temporibus sunt earum.</p>
                          <p class="card-text">
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit.</strong>
                          </p>
                        </div>
                      </div>


                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-warning">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Bottom Left Warning-->

              <!--Modal Form Login with Avatar Demo-->
              <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                  <!--Content-->
                  <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" class="rounded-circle img-responsive"
                        alt="Avatar photo">
                    </div>
                    <!--Body-->
                    <div class="modal-body text-center mb-1">

                      <h5 class="mt-1 mb-2">Maria Doe</h5>

                      <div class="md-form ml-0 mr-0">
                        <input type="password" type="text" id="form1" class="form-control ml-0">
                        <label for="form1" class="ml-0">Enter password</label>
                      </div>

                      <div class="text-center mt-4">
                        <button class="btn btn-cyan">Login
                          <i class="fas fa-sign-in-alt ml-1"></i>
                        </button>
                      </div>
                    </div>

                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal Form Login with Avatar Demo-->

              <!--Modal: Login / Register Form Demo-->
              <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Modal: Login / Register Form Demo-->

              <!-- Central Modal Large Info-->
              <div class="modal fade" id="centralModalLGInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Info</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg" alt="Material Design for Bootstrap - dashboard"
                        class="img-fluid">

                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-info">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Central Modal Large Info-->

              <!-- Central Modal Fluid Success-->
              <div class="modal fade" id="centralModalFluidSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fluid modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-success">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Central Modal Fluid Success-->

              <!-- Full Height Modal Right Success Demo-->
              <div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-success">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Right Success Demo-->

              <!-- Full Height Modal Left Info Demo-->
              <div class="modal fade left" id="fluidModalLeftInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-left modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-info">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Right Info Demo-->

              <!-- Full Height Modal Top Warning Demo-->
              <div class="modal fade top" id="fluidModalTopWarningDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-top modal-notify modal-warning" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Warning</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-warning">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Top Warning Demo-->

              <!-- Full Height Modal Bottom Danger Demo-->
              <div class="modal fade bottom" id="fluidModalBottomDangerDemo" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-bottom modal-notify modal-danger" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Danger</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-danger">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Bottom Danger Demo-->

            </section> --}}
            <!--Section: Modals-->

            <!-- Card header -->
            {{-- <div class="card-header">Modals</div>

            <!--Card content-->
            <div class="card-body">

              <div class="text-center mb-5">
                <p class="lead">Click buttons below to launch modals demo</p>
              </div>

              <!-- First row-->
              <div class="row">

                <!--First column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Frame Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal4.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Position</h5>

                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#frameModalTopInfoDemo"
                      data-backdrop="false">Top</a>
                    <br>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#frameModalBottomSuccessDemo"
                      data-backdrop="false">Bottom</a>
                  </div>
                </div>
                <!--First column-->

                <!--Second column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Side Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal3.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Position</h5>

                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sideModalTRSuccessDemo"
                      data-backdrop="false">Top Right</a>
                    <br>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sideModalTLInfoDemo">Top
                      Left</a>
                    <br>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sideModalBRDangerDemo">Bottom
                      Right</a>
                    <br>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sideModalBLWarningDemo">Bottom
                      Left</a>
                  </div>
                </div>
                <!--Second column-->

                <!--Third column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Central Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal2.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Size</h5>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLoginAvatarDemo">Small
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLRFormDemo">Medium
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#centralModalLGInfoDemo">Large
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#centralModalFluidSuccessDemo">Fluid
                    </button>
                  </div>
                </div>
                <!--Third column-->

                <!--Fourth column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Fluid Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal1.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Position</h5>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo">Right</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalLeftInfoDemo">Left</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalTopWarningDemo">Top</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalBottomDangerDemo">Bottom</button>
                  </div>
                </div>
                <!--Fourth column-->

              </div>
              <!-- /.First row-->

            </div> --}}

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
