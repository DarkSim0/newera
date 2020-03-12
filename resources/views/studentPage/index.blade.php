@extends('student_template.master')
@section('headers')
Personal Data Sheets    
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
        <div class="input-field col s12">
            <select name="EntryStatus" >
                <option value="" disabled selected>Choose</option>
                <option value="Freshman">Freshman</option>
                <option value="Transferee">Transferee</option>
                <option value="Cross Enrollee">Cross Enrollee</option>
                <option value="Second Course">Second Course</option>
                <label for="EntryStatus" >Entry Status</label>
            </select>
            <label for="entry_name">Entry Status</label>
        </div>
    
        <div class="headers">
            <h5>Applicant Basic Information</h5>
            <br>
        </div>
        <div class="row col l12" >
            <div class="input-field col m4">
                <input placeholder="" id="first_name" type="text" value="{{ old('fname') }}" name="fname" class="validate">
                <label for="first_name">First Name</label>
            </div>
        
            <div class="input-field col m4">
                <input placeholder="" id="middle_name" type="text" value="{{old('mname') }}" name="mname" class="validate">
                <label for="middle_name">Middle Name</label>
            </div>
        
            <div class="input-field col m4">
                <input placeholder="" id="last_name" type="text" value="{{old('lname') }}"  name="lname" class="validate">
                <label for="last_name">Last Name</label>
            </div>
        </div>
      
        <div class="row col l12" >
            <div class="input-field col s4">
                <select name="gender" value="{{old('gender') }}" >
                    <option value="" disabled selected>Choose your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <label for="Gender" >Gender</label>
                </select>
            </div>
        
            <div class="input-field col s4">
                <input placeholder="" id="age" value="{{ old('age') }}" name="age" type="text" class="validate">
                <label for="age">Age</label>
            </div>
    
            <div class="input-field col l4">
                <input placeholder="" id="birthdate" value="{{ old('dob') }}" name="dob" type="text" class="datepicker">
                <label for="birthdate">Birthdate</label>
            </div>
        </div>
    
        
        <div class="row col l12">
            
            <div class="col l6" >
                <div class="input-field ">
                    <input placeholder=""  value="{{ old('birth_place') }}" name="birth_place" type="text" >
                    <label for="birthplace">Place of Birth</label>
                </div>
            </div>
            <div class="input-field col s6">
                <select name="cs" value="{{ old('cs') }}"  >
                <option value="" disabled selected>Choose your Civil Status</option>
                <option value="S">Single</option>
                <option value="M">Married</option>
                <option value="D">Divorced</option>
                <option value="W">Widow(er)</option>
                    </select>
                <label>Civil Status</label>
            </div>
        </div>
        
    
        <div class="row col l12" >
            <div class="input-field col m6">
                <select name="religion"  value="{{ old('religion') }}"  >
                <option value="" disabled selected>Choose your Religion</option>
                <option value="Catholic">Catholic</option>
                <option value="Christian">Christian</option>
                <option value="Islam">Islam</option>
                <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                <option value="Buddhist">Buddhist</option>
                <option value="Protestan">Protestant</option>
                <option value="Jehova's Witness">Jehova's Witness</option>
                <option value="Prefer not to say">Prefer not to say</option>
                    </select>
                <label>Religion</label>
            </div>
        
            <div class="input-field col m6 ">
                <input placeholder="Ex: Filipino" name="Nationality" value="{{ old('Nationality') }}" type="text" >
                <label for="Nationality">Nationality</label>
            </div>
        </div>

        <div class="headers">
            <h5>Address</h5>
            <br>
        </div>

        <div class="input-field col s12">
    
            <label for="streetadd">Street address/Apartement No/House No/building, floor, etc.</label>
            
            <input type="text" name="streetadd" value="{{ old('streetadd') }}" class="validate" >
        </div>
    
        <div class="row col l12" >
            <div class="input-field col m6">
                <i class="material-icons prefix">textsms</i>
                <input id="province" type="text" value="{{ old('townprovince') }}" name="townprovince" class="autocomplete" autocomplete="off">
                <label for="province">Town/Province/Zipcode/Region</label>
                <div id="listProvince">
                </div>
            </div>
            <div class="input-field col m6">
                <input type="text" id="email" value="{{ old('emailbasic') }}" name="emailbasic" class="validate" >
                <label for="E-mail">E-mail Address</label>
            </div>
        </div>
      
        <div class="headers">
            <h5>Contact Number</h5>
            <br>
        </div>
        
        <div class="row col l12">
            
            <div class="col l6" >
                <div class="input-field ">
                    <input  name="contactnum" value="{{ old('contactnum') }}" type="text" >
                    <label for="contactnum">Contact number</label>
                </div>
            </div>
            <div class="input-field col s6">
                <input  name="landlinenum" value="{{ old('landlinenum') }}" type="text" >
                <label for="landline" >Landline number(optional)</label>
            </div>
        </div>
        
        <div class="headers">
            <h5>Family Background</h5>
            <br>
        </div>
       
        <div class="row col l12">
            <div class="col m4" >
                <div class="input-field ">
                    <input  name="fatherfname" value="{{ old('fatherfname') }}" type="text" >
                    <label for="fatherfname">Father's First Name</label>
                </div>
            </div>
            <div class="input-field col m4">
                <input  name="fathermname" value="{{ old('fathermname') }}" type="text" >
                <label for="fathermname" >Father's Middle Name</label>
            </div>
            <div class="input-field col m4">
                <input  name="fatherlname" value="{{ old('fatherlname') }}" type="text" >
                <label for="fatherlname" >Father's Last Name</label>
            </div>
        </div>

        <div class="row col l12" >
            <div class="input-field col m6">
                <input  name="fathernationality" value="{{ old('fathernationality') }}" type="text" >
                <label for="fathernationality" >Father's Nationality</label>
            </div>
            <div class="input-field col m6">
                <input  name="fatheroccupation" value="{{ old('fatheroccupation') }}" type="text" >
                <label for="fatheroccupation" >Father's Occupation</label>
            </div>
        </div>

        <div class="row col l12">
            <div class="col m4" >
                <div class="input-field ">
                    <input  name="motherfname" value="{{ old('motherfname') }}" type="text" >
                    <label for="motherfname">Mother's First Name</label>
                </div>
            </div>
            <div class="input-field col m4">
                <input  name="mothermname" value="{{ old('mothermname') }}" type="text" >
                <label for="mothermname" >Mother's Middle Name</label>
            </div>
            <div class="input-field col m4">
                <input  name="motherlname" value="{{ old('motherlname') }}" type="text" >
                <label for="motherlname" >Mother's Last Name</label>
            </div>
        </div>

        <div class="row col l12" >
            <div class="input-field col m6">
                <input  name="mothernationality" value="{{ old('mothernationality') }}" type="text" >
                <label for="mothernationality" >Mother's Nationality</label>
            </div>
            <div class="input-field col m6">
                <input  name="motheroccupation" value="{{ old('motheroccupation') }}" type="text" >
                <label for="motheroccupation" >Mother's Occupation</label>
            </div>
        </div>

        <div class="headers">
            <h5>Incase of Emergency Contact</h5>
            <br>
        </div>

        <div class="row col l12">
            <div class="input-field col m6 ">
                <input  name="contactper" value="{{ old('contactper') }}" type="text" >
                <label for="contactper">Contact Person</label>
            </div>
           
            <div class="input-field col m6">
                <input  name="guardiancon" value="{{ old('guardiancon') }}" type="text" >
                <label for="guardiancon" >Guardian Contact Number</label>
            </div>
        </div>

        <div class="headers">
            <h5>Educational Background</h5>
            <br>
        </div>

        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="elementary" value="{{ old('elementary') }}" type="text" >
                <label for="elementary">Elementary</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="elemattend" value="{{ old('elemattend') }}" type="text" >
                <label for="elemattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="elemgrad" value="{{ old('elemgrad') }}" type="text" >
                <label for="elemgrad" >Year Graduated</label>
            </div>
        </div>
        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="highschool" value="{{ old('highschool') }}" type="text" >
                <label for="highschool">High School</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="highattend" value="{{ old('highattend') }}" type="text" >
                <label for="highattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="highgrad" value="{{ old('highgrad') }}" type="text" >
                <label for="highgrad" >Year Graduated</label>
            </div>
        </div>
        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="senior" value="{{ old('senior') }}" type="text" >
                <label for="senior">Senior Highschool</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="seniorattend" value="{{ old('seniorattend') }}" type="text" >
                <label for="seniorattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="seniorgrad" value="{{ old('seniorgrad') }}" type="text" >
                <label for="seniorgrad" >Year Graduated</label>
            </div>
        </div>

        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="college" value="{{ old('college') }}" type="text" >
                <label for="college">College</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="collegeattend" value="{{ old('collegeattend') }}" type="text" >
                <label for="collegeattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="collegegrad" value="{{ old('collegegrad') }}" type="text" >
                <label for="collegegrad" >Year Graduated</label>
            </div>
        </div>
        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="vocational" value="{{ old('vocational') }}" type="text" >
                <label for="vocational">Vocational</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="vocattend" value="{{ old('vocattend') }}" type="text" >
                <label for="vocattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="vocgrad" value="{{ old('vocgrad') }}" type="text" >
                <label for="vocgrad" >Year Graduated</label>
            </div>
        </div>
        <div class="headers">
            <h5>Course Choice</h5>
            <br>
        </div>
        
        <div class="row col l12">
            
            <div class="input-field col s6" >
                <div class="input-field ">
                    <select name="firstChoice" >
                       @foreach($prog as $pro)
                        <option value="{{$pro->prog_name}}">{{$pro->prog_name}}</option>
                        @endforeach
                    </select>
                    <label for="firstChoice">First Choice</label>
                </div>
            </div>
            <div class="input-field col s6">
                <div class="input-field ">
                    <select name="secondChoice" >
                        @foreach($prog as $pro)
                        <option value="{{$pro->prog_name}}">{{$pro->prog_name}}</option>
                        @endforeach
                    </select>
                    <label for="secondChoice">Second Choice</label>
                </div>
            </div>
        </div>


        <div>
            <a class="btn waves-effect waves-light left"  href="{{url('/')}}">Go Back</a>
            <button class="btn waves-effect waves-light right" type="submit" name="action">
                <a type="submit" style="color: white;">Continue</a>
            <i class="material-icons right">send</i>
            
        </div>
   
</form>
@endsection
@section('scripts')
    <script >
        
        $('#province').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ route('autocomplete.search') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
            $('#listProvince').fadeIn();  
                        $('#listProvince').html(data);
            }
            });
            }
        });

        $(document).on('click', 'li', function(){  
            $('#province').val($(this).text());  
            $('#listProvince').fadeOut();  
        });  

       
    </script>
@endsection 