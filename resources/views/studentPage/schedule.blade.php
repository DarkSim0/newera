@extends('student_template.master')
@section('headers')
Schedule your exam    
@endsection
@section('custom_style')

<link rel="stylesheet" href="{{asset('assets/css/fullcalendar.css')}}">
@endsection
@section('content')
<form action="" name="schedForm" method="POST">
    @csrf    
        @if($errors->any())
        
            <div class="col s12">
                <ul class="collection">
                    @foreach($errors->all() as $er)
                    <li class="collection-item red" style="color:white; font-size:large" > <center>Missing: {{$er}}</center> </li>
                    @endforeach
                </ul>
            </div>
         
        @endif
 
        <div class="panel-body">
           {!! $calendar->calendar() !!}
        </div>
        <div class="row col l12" >
            <div class="input-field col m6">
                <input placeholder="" id="sched" value="{{ old('schedule_sched') }}" name="student_sched" type="text" class="datepicker">
                <label for="student_sched">Exam date</label>
            </div>
            <div class="input-field col m6">
                <label>
                    <input type="checkbox" name="confirm"  onclick="copyCat(this.form)" >
                    <span>Click if you agree to the date of exam</span>
                  </label>
            </div> 
           
        </div>
        <div class="row col l12">
            <div class="col m6">
                <input type="text" id="schedEnd" name="student_schedEnd" readonly>    
            </div>    
            <div class="input-field col m6">
                <label for="student_schedEnd">Confirmed date</label>
            </div>  
           
        </div>

        <div class="row col l12">
            <a class="btn waves-effect waves-light left"  href="{{url('/')}}">Go Back</a>
            <button class="btn waves-effect waves-light right" type="submit" name="action">
                <a type="submit" style="color:white;">Continue</a>
            <i class="material-icons right">send</i>
        </div>
        <div>
        
        </div>
   
</form>
@endsection
@section('scripts')
    {!! $calendar->script() !!}
    <script src="{{asset('assets/js/moment.js')}}" ></script>
    <script src="{{asset('assets/js/fullcalendar.js')}}" ></script>
    <script type="text/javascript" >
        function copyCat(copy){
            if(copy.confirm.checked == true){
                copy.student_schedEnd.value = copy.student_sched.value;
            }
        }
    </script>
 
@endsection