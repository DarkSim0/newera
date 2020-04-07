<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/pdf_assets/uikit.min.css')}}">
    <title>{{$print->fname.' '.$print->enrollID}}</title>

    <style>
      
        #neu_logo{
            height: 80%;
            width: 80%;
            margin-left: 28;
            margin-top: 155;
            position: absolute;
            opacity: 0.1;
        }
        .page-break {
            page-break-after: always;
        }
        .container{
            position: relative;
 
        }
    </style>
        
</head>
<body>
    <center><p><strong>SCAN QR CODE FOR STATUS</strong></p></center>
    <img id="neu_logo" src="{{asset('/images/neu_logo.png')}}" alt="image">
   
<div class="container">
    <center><img  id="qrcode" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(200)->generate($print->scheds['status'])) }} "></center>
    
    <center><h3 class="uk-article-meta">{{$print->fname.' '.$print->mname.' '.$print->lname}}</h3></center>
    <center><h3 class="uk-article-meta">{{$print->scheds['title']}}</h3></center>
    <table style="width:100%">
        <tr>
          <th>Gender:</th>
          <th>{{$print->gender}}</th>
          <th></th>
        </tr>
        <tr>
            <th>Age:</th>
            <th>{{$print->age}}</th>
            <th></th>
          </tr>
          <tr>
            <th>Civil Status:</th>
            <th>{{$print->cs}}</th>
            <th></th>
          </tr>
      </table> 
</div>
</body>
</html>