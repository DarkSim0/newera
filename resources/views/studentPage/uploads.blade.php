@extends('student_template.master')
@section('headers')
Uploaded file    
@endsection
@section('custom_style')
<style>

 
.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>
@endsection
@section('content')
<div class="row col l12">
    <div class="col l6" >
        <div class="input-field ">
           {{ $upload->file}}
        </div>
    </div>
</div>
<div class="row col l12">
    <div class="iframe-container" >
        <iframe  style="margin:auto;" src="{{url('/storage/'.$upload->file)}}" ></iframe>
    </div>
   
</div>
<div class="col l12">
    <a href="{{url('/')}}" class="btn btn-cyan" >GO BACK</a>
</div>
@endsection