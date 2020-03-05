<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/pdf_assets/spectre.min.css')}}">
    <title>Document</title>

    <style>
        #neu_logo{
            height: 90px;
            width: 90px;
            margin-left: 580px;
            margin-top: -70px;
            position: absolute;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="h3" >Registration Form</h3>
        {{-- <img id="neu_logo" src="{{asset('/images/neu_logo.png')}}" alt="image"> --}}
    <div class="form-group">
    <br>
        <p style="margin-left: 5px;" class="ins">Entry Status: <strong>{{$print->EntryStatus}}</strong></p>
      <table class="table table-striped" >
        <tbody>
            <tr>
                <td>Name: {{$print->fname}} {{$print->mname}} {{$print->lname}}</td>
                <td>Gender: {{$print->gender}}</td>
            </tr>
        </tbody>
      </table>
    </div>
    </div>

   
</body>
</html>