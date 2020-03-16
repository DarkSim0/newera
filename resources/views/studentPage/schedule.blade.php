@extends('student_template.master')
@section('headers')
Schedule your exam    
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
        
        <div class="row col l12" >
            <div class="input-field col l6">
                <input placeholder="" id="sched" value="{{ old('schedule_sched') }}" name="student_sched" type="text" class="datepicker">
                <label for="student_sched">Exam date</label>
            </div>
            <div class="input-field col l6">
                <label>
                    <input type="checkbox" name="confirm"  onclick="copyCat(this.form)" >
                    <span>Click if you agree</span>
                  </label>
            </div>
            <div class="row col l12">
                <div class="input-field col l6">
                    <input type="text" id="schedEnd" name="student_schedEnd" readonly>    
                </div>    
                <div class="input-field col l6">
                    <label for="student_schedEnd">Confirm date</label>
                </div>  
               
            </div>
            
           
        </div>


        <div>
            <a class="btn waves-effect waves-light left"  href="{{url('/')}}">Go Back</a>
            <button class="btn waves-effect waves-light right" type="submit" name="action">
                <a type="submit" style="color:white;">Continue</a>
            <i class="material-icons right">send</i>
        </div>
   
</form>
@endsection
@section('scripts')
    <script type="text/javascript" >
        function copyCat(copy){
            if(copy.confirm.checked == true){
                copy.student_schedEnd.value = copy.student_sched.value;
            }
        }
    </script>
@endsection