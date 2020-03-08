<!DOCTYPE html>
<html>
<head>
    <title>New Era</title>
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
    display: inline;
        }
        
</style>
</head>
<body>

    <div class="container">
    <div class="row card hoverable">
        <div class="card-content ">
            <img src="{{asset('images/neu_logo.png')}}" id="neu_logo" alt="">
        <h4 class="center blue-text">Register</h4>
        <form class="row s12" method="POST"  action="{{ route('register') }}" >
        @csrf
        <div class="col s12">
            <div class="input-field">
                <input id="name" type="text" placeholder="John Doe" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="input-field">
                 <input placeholder="Email Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                   @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>
        <div class="col s12">
            <div class="input-field">
                <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>
        <div class="col s12">
            <div class="input-field">
                  <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <!-- <div class="col s12">
            <p><label><input type="checkbox"></label></p>
        </div> -->
        <div class="col s12 center">
            <button type="submit" class="btn btn-large waves-effect waves-light blue">
                    Register
                </button>
        </div>
    </form>
    </div>
</div>
</div>
</body>
</html>