<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/pdf_assets/uikit.min.css')}}">
    <title>{{$print->fname}}}</title>

    <style>
        #neu_logo{
            height: 90px;
            width: 90px;
            margin-left: 580px;
            margin-top: -70px;
            position: absolute;
        }
        table{
	border: 1px solid black;
}


    </style>
</head>
<body>
<div class="container">
    <h3 class="h3" >Registration Form</h3>
    {{-- <img id="neu_logo" src="{{asset('/images/neu_logo.png')}}" alt="image"> --}}
   
    <br>
        <p style="margin-left: 3px;" class="ins">Entry Status: <strong>{{$print->EntryStatus}}</strong></p>
    <table style="width: 100%" >
        <tbody>
            <tr>
                <td>Name: {{$print->fname}} {{$print->mname}} {{$print->lname}}</td>
                <td>Gender: {{$print->gender}}</td>
            </tr>
        </tbody>
    </table>
  
    <table style="width: 100%; margin-top:20px;">
        <tbody>
            <tr >
                <td>Age: {{$print->age}}</td>
                <td>Birth Date: {{$print->dob}}</td>
                <td>Birth Place: {{$print->birth_place}}</td>
            </tr>
            <tr>
                <td>Civil Status: {{$print->cs}}</td>
                <td>Nationality: {{$print->Nationality}}</td>
                <td>Religion: {{$print->religion}}</td>
            </tr>
        </tbody>
    </table>

    
    <table style="width: 100%; margin-top:10px;" >
        <tbody>
            <tr >
                <td>Address </td>
            </tr>
            <tr>
                <td>{{$print->streetadd}}</td>
                <td>{{$print->townprovince}}</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>