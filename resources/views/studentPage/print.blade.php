<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/pdf_assets/uikit.min.css')}}">
    <title>{{$print->fname}}</title>

    <style>
        #neu_logo{
            height: 90px;
            width: 90px;
            margin-left: 10px;
            margin-top: -20px;
            position: absolute;
        }

    </style>
</head>
<body>
<div class="container">
    {{-- <img id="neu_logo" src="{{asset('/images/neu_logo.png')}}" alt="image"> --}}
    <center><h3 class="uk-article-title" >Registration Form</h3></center>
    <center><h4 class="uk-article-meta" style="margin-top:-20px; margin-bottom:-20px;" >sample text here</h4></center>
    <br>
    <div class="uk-card uk-card-default">
        <div class="uk-card uk-card-body">
            <h3 class="uk-card-title">Entry Status: <strong>{{$print->EntryStatus}}</strong></h3>
            <p>Name: {{$print->fname}} {{$print->mname}} {{$print->lname}} </p>
        </div>
    </div>
    <table class="uk-table uk-table-striped">
        <caption> <strong >Basic Information</strong> </caption>
        
        <tfoot>
            <tr>
                <td>Gender: {{$print->gender}}</td>
                <td>Age: {{$print->age}}</td>
                <td>Birth Date: {{$print->dob}}</td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Civil Status: {{$print->cs}}</td>
                <td>Nationality: {{$print->Nationality}}</td>
                <td>Religion: {{$print->religion}}</td>
            </tr>
        </tbody>
    </table>
    <div class="uk-child-width-expand@s"  uk-grid>
        <ul class="uk-list uk-list-striped">
            <li>Address: {{$print->streetadd}}</li>
            <li>Town province: {{$print->townprovince}}</li>
        </ul>
        
    </div>
    <table class="uk-table uk-table-striped">
        <caption> <strong>Contact Number</strong> </caption>
        <tbody>
            <tr>
                <td>Contact Number: {{$print->contactnum}}</td>
                
                <td>Landline(Optional): {{$print->landlinenum}}</td>
            </tr>
        </tbody>
    </table>
    <table class="uk-table uk-table-striped">
        <caption> <strong>Family Background</strong> </caption>
        <tbody>
            <tr>
                <td>Father Name: {{$print->fatherfname}} {{$print->fathermname}} {{$print->fatherlname}}</td>
                <td>Father Nationality: {{$print->fathernationality}} </td> 
                <td>Occupation: {{$print->fatheroccupation}} </td>
            </tr>
            <tr>
                <td>Mother Name: {{$print->motherfname}} {{$print->mothermname}} {{$print->motherlname}}</td>
                <td>Mother Nationality: {{$print->mothernationality}} </td> 
                <td>Occupation: {{$print->motheroccupation}} </td>
            </tr>
        </tbody>
    </table>
</div>


</body>
</html>