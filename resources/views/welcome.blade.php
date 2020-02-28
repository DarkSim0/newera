<!DOCTYPE html>
<html lang="en">

<head>

    <title>New Era university</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
    <!-- Compiled and minified CSS -->
  
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/materializeModified/materialize.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <!--JavaScript at end of body for optimized loading-->

</head>

<body>
    <div class="row">
        <!-- Left Navigation Panel -->

        <div class="col s12">
            <img class="materialboxed" width="100" src="{{asset('images/neu_logo.png')}}">
            <h3>WEB-BASED ADMISSION MANAGEMENT SYSTEM</h3>
        </div>
        <div class="left col s3">
            <h4>ADMISSION</h4>
            <div class="collection">
                <a href="index.html" class="collection-item">Home Page</a>
                <a href="{{url('/student_register')}}" class="collection-item">New Registration</a>
                <a href="#" class="collection-item">Admission Office Contact Information</a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="col s9">
            <h5>WELCOME TO NEW ERA UNIVERSITY!</h5>
        
         
        </div>
       
    </div>
    </div>


    <script type="text/javascript" src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <!-- Compiled and minified JavaScript -->
    
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>

</body>

</html>