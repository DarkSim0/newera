<!DOCTYPE html>
<html lang="en">

<head>

    <title>New Era | Student Registration</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/materialize/css/materialize.css')}}" media="screen,projection" />

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>

    <!-- Compiled and minified JavaScript -->
    @yield('custom_style')


</head>

<body>

    <div class="container">
        <div class="card-panel white">
            <div>
                <h5 class="headers">@yield('headers')</h5>
                <br>
            </div>

            <!-- Basic Information Sheet -->

            <div class="row">
                <div class="col s12">
                    
                    <div class="row">
                        @yield('content')

                    </div>
                </div>
                </div>

            </div>

        </div>

        <script src="{{asset('assets/js/materialize.min.js')}}"></script>
     @yield('scripts')
        <script>
            $(document).ready(function() {
                M.updateTextFields();
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');
                var instances = M.Datepicker.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function() {
                $('.datepicker').datepicker();
            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options);
            });

            // Or with jQuery

            $(document).ready(function() {
                $('select').formSelect();
            });
        </script>
       

</body>

</html>