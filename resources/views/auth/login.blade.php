<!DOCTYPE html>
<html>
<head>
    <title>NEU</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/materializeModified/materialize.min.css')}}">
<style type="text/css">
    body{
        padding: 0;
        margin: 0;
        background: #ddd;
    }
    .btn{
        margin-top: 10px;

    }
    .container{
        margin:100px auto;
        width: 35%;

    }
    @media(max-width: 952px){
        .container{
            width: 60%;
        }
    }
        @media(max-width: 475px){
        .container{
            width: 80%;
        }
    }
    #neu_logo{
        height: auto;
            width: 100%;
            max-width: 100px;
            margin-left: 40%;
            margin-top: -70%;
            position: absolute;
            position: relative;
            
        }
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #b8b894;
        opacity: 1; /* Firefox */
        }  
</style>
</head>
<body>

    <div class="container">
    <div class="row card hoverable">
        <div class="card-content ">
            <img src="{{asset('images/neu_logo.png')}}" id="neu_logo" alt="">
       
        <form class="row s12" method="POST"  action="{{ route('login') }}" >
        @csrf
        <div class="col s12">
            <div class="input-field">
                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col s12">
            <div class="input-field">
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <!-- forgot password -->
        
        <!-- <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div> -->

        <!-- end of forgot password -->

        <div class="col s12">
            <p><label><input type="checkbox"></label></p>
        </div>
        <div class="col s12 center">
            <button type="submit" class="btn btn-large waves-effect waves-light blue">
                    Login<i class="material-icons right">send</i>
                </button>
        </div>
    </form>
    </div>
</div>
</div>
</body>
</html>