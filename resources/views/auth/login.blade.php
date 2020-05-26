<!DOCTYPE html>
<html>
<head>
    <title>NEU</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/admin.login.css')}}">
<style type="text/css">

  

    #neu_logo{
        overflow: hidden;
        background: #3385ff;
        }
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #b8b894;
        opacity: 1; /* Firefox */
        }
    #main_frame{
           margin-top: 200px;
    }      
</style>
</head>
<body>

    <main id="main_frame" >
        <div class="container">
        <div class="row">
          <div class="col s8 offset-s2">
      
            <div class="card card-login">
              <div class="card-login-splash">
                <center>
                  <strong><p>Admission Management System for New Era University</p></strong>
                </center>
                
               
                {{-- <img id="neu_logo" src="{{asset('images/sun_logo.png')}}" alt="neu_logo"> --}}
              </div>
              <div class="card-content">
                <span class="card-title">Log In</span>
                <form method="POST"  action="{{ route('login') }}">
                    @csrf
                    <div class="input-field">
                        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="input-field">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
      
                  <a href="#!">Forgot Password?</a>
      
                  <br><br>
                  <div>
                    <button type="submit" class="btn right waves-effect waves-light blue">
                        Login<i class="material-icons right">send</i>
                    </button>
                    <a href="{{url('/register')}}" class="btn waves-effect waves-light blue" >Register</a>
                  </div>
      
                </form>
              </div>
            </div>
      
          </div>
        </div>
      
      </div>
    </main>
    
<script src="{{asset('assets/js/jsModify/admin.login.js')}}" ></script>
</body>
</html>