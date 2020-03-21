
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Era</title>

    <!-- Stylesheet -->
    <link href="{{asset('assets/css/materialize/css/materializeV2.min.css')}}" rel="stylesheet">
</head>

  <body>

    <!-- Navbar -->
    <nav class="n bi fq">
      <div class="nav-wrapper">
        <a href="startup-horizontal-half.html" class="brand-logo"><i class="icon-diamond"></i></a>
        <ul id="nav-mobile" class="ag hide-on-med-and-down">
        
          <li><a href="startup-blog.html">Blog</a></li>
          <li><a class="g" href="startup-team.html">Team</a></li>
        </ul>

        <ul id="pages" class="dropdown-content">
          <li><a href="startup-horizontal-half.html">Horizontal Halves</a></li>
          <li><a href="startup-zoom-out.html">Zoom Out</a></li>
          <li><a href="startup-circle-reveal.html">Circle Reveal</a></li>
          <li><a href="startup-phone-wall.html">Phone Wall</a></li>
          <li><a href="startup-element-transitions.html">Element Transitions</a></li>
          <li><a href="startup-basic-elements.html">Basic Elements</a></li>
          <li><a href="startup-shuffle.html">Shuffle</a></li>
          <li><a href="startup-postcard.html">Postcards</a></li>
        </ul>

        <a class="waves-effect waves-light btn-flat " href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
             </a><i class="material-icons black-text">menu</i></a>
      </div>
    </nav>
    <ul id="slide-out" class="side-nav">
      <li class="no-padding">
       
            <div class="collapsible-body">
              <ul>
                <li><a href="startup-horizontal-half.html">Horizontal Halves</a></li>
                <li><a href="startup-zoom-out.html">Zoom Out</a></li>
                <li><a href="startup-circle-reveal.html">Circle Reveal</a></li>
                <li><a href="startup-phone-wall.html">Phone Wall</a></li>
                <li><a href="startup-element-transitions.html">Element Transitions</a></li>
                <li><a href="startup-basic-elements.html">Basic Elements</a></li>
                <li><a href="startup-shuffle.html">Shuffle</a></li>
                <li><a href="startup-postcard.html">Postcards</a></li>
              </ul>
            </div>
      </li>
      <li><a class="waves-effect waves-teal" href="startup-blog.html">Blog</a></li>
      <li><a class="waves-effect waves-teal g" href="startup-team.html">Team</a></li>
    
    </ul>


    <!-- Footer -->
    <footer class="page-footer">
      <div class="dv">
        <div class="c">
          <div class="d ka ko">
            <p>Made with love by Materialize.</p>
          </div>
          <div class="d ka ko">
            <h5>About</h5>
            <ul>
              <li><a href="#!">Blog</a></li>
              <li><a href="#!">Pricing</a></li>
              <li><a href="#!">Docs</a></li>
            </ul>
          </div>
          <div class="d ka ko">
            <h5>Connect</h5>
            <ul>
              <li><a href="#!">Community</a></li>
              <li><a href="#!">Subscribe</a></li>
              <li><a href="#!">Email</a></li>
            </ul>
          </div>
          <div class="d ka ko">
            <h5>Contact</h5>
            <ul>
              <li><a href="#!">Twitter</a></li>
              <li><a href="#!">Facebook</a></li>
              <li><a href="#!">Github</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="{{asset('assets/js/2.1.1/jquery.js')}}"></script>
    <script src="{{asset('assets/js/2.1.1/materialize.min.js')}}"></script>

  </body>
</html>