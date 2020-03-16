@extends('student_template.master')
@section('headers')
Schedule your exam    
@endsection
@section('content')
<form action="" method="POST">
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
            <div class="input-field col l12">
                <input placeholder="" id="schedate" value="{{ old('schedule_sched') }}" name="schedule_sched" type="text" class="datepicker">
                <label for="birthdate">Start date  </label>
            </div>
        <input type="hidden" name='schedule_schedEnd' value=""  >
            
        </div>


        <div>
            <a class="btn waves-effect waves-light left"  href="{{url('/')}}">Go Back</a>
            <button onclick="copyCat()" class="btn waves-effect waves-light right" type="submit" name="action">
                <a type="submit" style="color:white;">Continue</a>
            <i class="material-icons right">send</i>
        </div>
   
</form>
@endsection
@section('scripts')
    <script type="text/javascript" >
        function copyCat(){
            var str = document.getElementById("schedate").value;
           
        }
        

    </script>
@endsection