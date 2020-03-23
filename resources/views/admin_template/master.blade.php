
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <title>Neu - {{Auth::user()->level['access_level']}}</title>
    <link href="{{asset('assets/css/materialize/css/datatables.min.css')}}" rel="stylesheet">
    <!-- Fullcalendar-->
    <!-- Materialize-->
    <link href="{{asset('assets/css/materialize/css/materializeV2.min.css')}}" rel="stylesheet">
    <!-- Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
       #neulogo{
            height: 50px;
            width: 50px;
            margin-left: 120px;
            margin-top: 5px;
            position: absolute;
        }
        #logofooter{
            height: 150px;
            width: 150px;
            margin-left: 5px;
            margin-top: 5px;
            position: absolute;
        }
    </style>
</head>
  <body class="has-fixed-sidenav">
    <header>
      <div class="navbar-fixed">
        <nav class="navbar white">
          <div class="nav-wrapper"><a href="#!" class="brand-logo grey-text text-darken-4">Home</a>
            <ul id="nav-mobile" class="right">
             
              {{-- <li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li> --}}
              <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a></li>
            </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
          </div>
        </nav>
      </div>
      <ul id="sidenav-left" class="sidenav sidenav-fixed">
        <li><a href="/pages/admin-dashboard" class="logo-container">{{Auth::user()->name}}<img id="neulogo" src="{{
          asset('/images/neu_logo.png')
          }}" alt="neu" srcset=""></a></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold waves-effect active"><a class="collapsible-header">Pages<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{url('/admin')}}" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-fixed-chart" class="waves-effect">Fixed Chart<i class="material-icons">list</i></a></li>
                  <li><a href="/pages/admin-grid" class="waves-effect">Grid<i class="material-icons">dashboard</i></a></li>
                  <li><a href="/pages/admin-chat" class="waves-effect">Chat<i class="material-icons">chat</i></a></li>
                </ul>
              </div>
            </li>
            {{-- <li class="bold waves-effect"><a class="collapsible-header">Charts<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-line-charts" class="waves-effect">Line Charts<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-bar-charts" class="waves-effect">Bar Charts<i class="material-icons">equalizer</i></a></li>
                  <li><a href="/pages/admin-area-charts" class="waves-effect">Area Charts<i class="material-icons">multiline_chart</i></a></li>
                  <li><a href="/pages/admin-doughnut-charts" class="waves-effect">Doughnut Charts<i class="material-icons">pie_chart</i></a></li>
                  <li><a href="/pages/admin-financial-charts" class="waves-effect">Financial Charts<i class="material-icons">euro_symbol</i></a></li>
                  <li><a href="/pages/admin-interactive-charts" class="waves-effect">Interactive Charts<i class="material-icons">touch_app</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Tables<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-fullscreen-table" class="waves-effect">Fullscreen with Chart<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-table-custom-elements" class="waves-effect">Table with Custom Elements<i class="material-icons">settings</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Calendar<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-calendar" class="waves-effect">Calendar<i class="material-icons">cloud</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Headers<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-header-tabbed" class="waves-effect">Tabbed<i class="material-icons">tab</i></a></li>
                  <li><a href="/pages/admin-header-metrics" class="waves-effect">Metrics<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-header-search" class="waves-effect">Search<i class="material-icons">search</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Account<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-log-in" class="waves-effect">Log In<i class="material-icons">person</i></a></li>
                  <li><a href="/pages/admin-settings" class="waves-effect">Settings<i class="material-icons">settings</i></a></li>
                </ul>
              </div>
            </li> --}}
          </ul>
        </li>
      </ul>

      <div id="dropdown1" class="dropdown-content notifications">
        <div class="notifications-title">notifications</div>
        <div class="card">
          <div class="card-content"><span class="card-title">Joe Smith made a purchase</span>
            <p>Content</p>
          </div>
          <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
        </div>
        <div class="card">
          <div class="card-content"><span class="card-title">Daily Traffic Update</span>
            <p>Content</p>
          </div>
          <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
        </div>
        <div class="card">
          <div class="card-content"><span class="card-title">New User Joined</span>
            <p>Content</p>
          </div>
          <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
        </div>
      </div>
      <div id="chat-dropdown" class="dropdown-content dropdown-tabbed">
        <ul class="tabs tabs-fixed-width">
          <li class="tab col s3"><a href="#settings">Settings</a></li>
          <li class="tab col s3"><a href="#friends" class="active">Actions</a></li>
        </ul>
        <div id="settings" class="col s12">
          <div class="settings-group">
            <div class="setting">Night Mode
              <div class="switch right">
                <label>
                  <input type="checkbox"><span class="lever"></span>
                </label>
              </div>
            </div>
            <div class="setting">Beta Testing
              <label class="right">
                <input type="checkbox"><span></span>
              </label>
            </div>
          </div>
        </div>
        <div id="friends" class="col s12">
          <ul class="collection flush">
     
            <li class="collection-item avatar">
              
              <p class="truncate"><a class="waves-effect waves-light btn-flat " href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a></p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <main><div class="container">
  @yield('content')
  {{-- end here --}}
</div>
</main><footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col s6 m3">
        <img class="materialize-logo" id="logofooter" src="{{asset('images/neu_logo.png')}}" alt="Materialize">
      </div>
      <div class="col s6 m3">
        <h5>About</h5>
        <ul>
          <li><a href="#!">Blog</a></li>
          <li><a href="#!">Pricing</a></li>
          <li><a href="#!">Docs</a></li>
        </ul>
      </div>
      <div class="col s6 m3">
        <h5>Connect</h5>
        <ul>
          <li><a href="#!">Community</a></li>
          <li><a href="#!">Subscribe</a></li>
          <li><a href="#!">Email</a></li>
        </ul>
      </div>
      <div class="col s6 m3">
        <h5>Contact</h5>
        <ul>
          <li><a href="#!">Twitter</a></li>
          <li><a href="#!">Facebook</a></li>
          <li><a href="#!">Github</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer><!-- Scripts -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>

<!-- External libraries -->



<script src="{{asset('assets/js/fullcalendar.js')}}"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script> --}}


<!-- Initialization script -->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
  </body>
</html>