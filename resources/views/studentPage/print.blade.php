<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
        .page-break {
            page-break-after: always;
        }
    </style>
        
</head>
<body>
<div class="container">
    {{-- <img id="neu_logo" src="{{asset('/images/neu_logo.png')}}" alt="image"> --}}
    <center><h3 class="uk-article-title" >Registration Form</h3></center>
    <center><h4 class="uk-article-meta" style="margin-top:-20px; margin-bottom:-20px;" >sample text here</h4></center>
    <br>
    <div class="">
        <div class="">
            <h3 class="">Entry Status: <strong>{{$print->EntryStatus}}</strong></h3>
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
                <td>Father's Name </td>
                <td>Father Nationality </td> 
                <td>Occupation  </td>
            </tr>
            <tr>
                <td>{{$print->fatherfname}} {{$print->fathermname}} {{$print->fatherlname}}</td>
                <td>{{$print->fathernationality}} </td> 
                <td>{{$print->fatheroccupation}} </td>
            </tr>
            <tr>
                <td>Mother's Name</td>
                <td>Mother Nationality</td> 
                <td>Occupation</td>
            </tr>
            <tr>
                <td>{{$print->motherfname}} {{$print->mothermname}} {{$print->motherlname}}</td>
                <td>{{$print->mothernationality}} </td> 
                <td>{{$print->motheroccupation}} </td>
            </tr>
        </tbody>
    </table>
    <table class="uk-table uk-table-striped">
        <caption> <strong>Emergency Contact</strong> </caption>
        <tbody>
            <tr>
                <td>Contact Person: {{$print->contactper}}</td>
                <td>Contact Number: {{$print->guardiancon}}</td>
            </tr>
        </tbody>
    </table>
    <div class="page-break" > </div>
   
        <table class="uk-table uk-table-striped">
            <caption> <strong>Educational Background</strong> </caption>
            <tbody>
                <tr>
                    <td>Elementary</td>
                    <td>Year Attended</td>
                    <td>Year Graduated</td>
                </tr>
                <tr>
                    <td>{{$print->elementary}}</td>
                    <td>{{$print->elemattend}}</td>
                    <td>{{$print->elemgrad}}</td>
                </tr>
                <tr>
                    <td>High School</td>
                    <td>Year Attended</td>
                    <td>Year Graduated</td>
                </tr>
                <tr>
                    <td>{{$print->highschool}}</td>
                    <td>{{$print->highattend}}</td>
                    <td>{{$print->highgrad}}</td>
                </tr>
                <tr>
                    <td>Seniour High School</td>
                    <td>Year Attended</td>
                    <td>Year Graduated</td>
                </tr>
                <tr>
                    <td>{{$print->senior}}</td>
                    <td>{{$print->seniorattend}}</td>
                    <td>{{$print->seniorgrad}}</td>
                </tr>
                <tr>
                    <td>College</td>
                    <td>Year Attended</td>
                    <td>Year Graduated</td>
                </tr>
                <tr>
                    <td>{{$print->college}}</td>
                    <td>{{$print->collegeattend}}</td>
                    <td>{{$print->collegegrad}}</td>
                </tr>
                <tr>
                    <td>Vocational</td>
                    <td>Year Attended</td>
                    <td>Year Graduated</td>
                </tr>
                <tr>
                    <td>{{$print->vocational}}</td>
                    <td>{{$print->vocattend}}</td>
                    <td>{{$print->vocgrad}}</td>
                </tr>
            </tbody>
        </table>
   
</div>
</body>
</html>