@extends('student_template.master')
@section('headers')
Personal Data Sheets    
@endsection
@section('content')
<form action="" method="POST">
    @csrf
    
        <div class="input-field col s12">
            <select name="EntryStatus" >
                <option value="" disabled selected>Choose</option>
                <option value="fresh">Freshman</option>
                <option value="transfer">Transferee</option>
                <option value="crosen">Cross Enrollee</option>
                <option value="secound">Second Course</option>
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
                <input placeholder="" id="first_name" type="text" name="fname" class="validate">
                <label for="first_name">First Name</label>
            </div>
        
            <div class="input-field col m4">
                <input placeholder="" id="middle_name" type="text" name="mname" class="validate">
                <label for="middle_name">Middle Name</label>
            </div>
        
            <div class="input-field col m4">
                <input placeholder="" id="last_name" type="text" name="lname" class="validate">
                <label for="last_name">Last Name</label>
            </div>
        </div>
      
        <div class="row col l12" >
            <div class="input-field col s4">
                <select name="gender" >
                    <option value="" disabled selected>Choose your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <label for="Gender" >Gender</label>
                </select>
            </div>
        
            <div class="input-field col s4">
                <input placeholder="" id="age" name="age" type="text" class="validate">
                <label for="age">Age</label>
            </div>
    
            <div class="input-field col l4">
                <input placeholder="" id="birthdate" name="dob" type="text" class="datepicker">
                <label for="birthdate">Birthdate</label>
            </div>
        </div>
    
        
        <div class="row col l12">
            
            <div class="col l6" >
                <div class="input-field ">
                    <input placeholder="" name="birth_place" type="text" >
                    <label for="birthplace">Place of Birth</label>
                </div>
            </div>
            <div class="input-field col s6">
                <select name="cs" >
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
                <select name="religion" >
                <option value="" disabled selected>Choose your Religion</option>
                <option value="cath">Catholic</option>
                <option value="chri">Christian</option>
                <option value="isla">Islam</option>
                <option value="ignc">Iglesia ni Cristo</option>
                <option value="budd">Buddhist</option>
                <option value="prot">Protestant</option>
                <option value="jeho">Jehova's Witness</option>
                <option value="pref">Prefer not to say</option>
                    </select>
                <label>Religion</label>
            </div>
        
            <div class="input-field col m6 ">
                <input placeholder="Ex: Filipino" name="Nationality"  type="text" >
                <label for="Nationality">Nationality</label>
            </div>
        </div>
        <div class="headers">
            <h5>Address</h5>
            <br>
        </div>
        <div class="input-field col s12">
    
            <label for="streetadd">Street address/Apartement No/House No/building, floor, etc.</label>
            
            <input type="text" name="streetadd" class="validate" >
        </div>
    
        <div class="row col l12" >
            <div class="input-field col m6">
                <input id="province" type="text" name="townprovince" class="validate" autocomplete="off">
                <label for="province">Town/Province/Zipcode/Region</label>
                <div id="listProvince">
                </div>
            </div>
            <div class="input-field col m6">
                <input type="text" id="email" name="emailbasic" class="validate" >
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
                    <input  name="contactnum" type="text" >
                    <label for="contactnum">Contact number</label>
                </div>
            </div>
            <div class="input-field col s6">
                <input  name="landlinenum" type="text" >
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
                    <input  name="fatherfname" type="text" >
                    <label for="fatherfname">Father's First Name</label>
                </div>
            </div>
            <div class="input-field col m4">
                <input  name="fathermname" type="text" >
                <label for="fathermname" >Father's Middle Name</label>
            </div>
            <div class="input-field col m4">
                <input  name="fatherlname" type="text" >
                <label for="fatherlname" >Father's Last Name</label>
            </div>
        </div>

        <div class="row col l12" >
            <div class="input-field col m6">
                <input  name="fathernationality" type="text" >
                <label for="fathernationality" >Father's Nationality</label>
            </div>
            <div class="input-field col m6">
                <input  name="fatheroccupation" type="text" >
                <label for="fatheroccupation" >Father's Occupation</label>
            </div>
        </div>

        <div class="row col l12">
            <div class="col m4" >
                <div class="input-field ">
                    <input  name="motherfname" type="text" >
                    <label for="motherfname">Mother's First Name</label>
                </div>
            </div>
            <div class="input-field col m4">
                <input  name="mothermname" type="text" >
                <label for="mothermname" >Mother's Middle Name</label>
            </div>
            <div class="input-field col m4">
                <input  name="motherlname" type="text" >
                <label for="motherlname" >Mother's Last Name</label>
            </div>
        </div>

        <div class="row col l12" >
            <div class="input-field col m6">
                <input  name="mothernationality" type="text" >
                <label for="mothernationality" >Mother's Nationality</label>
            </div>
            <div class="input-field col m6">
                <input  name="motheroccupation" type="text" >
                <label for="motheroccupation" >Mother's Occupation</label>
            </div>
        </div>

        <div class="headers">
            <h5>Incase of Emergency Contact</h5>
            <br>
        </div>

        <div class="row col l12">
            <div class="input-field col m6 ">
                <input  name="contactper" type="text" >
                <label for="contactper">Contact Person</label>
            </div>
           
            <div class="input-field col m6">
                <input  name="guardiancon" type="text" >
                <label for="guardiancon" >Guardian Contact Number</label>
            </div>
        </div>

        <div class="headers">
            <h5>Educational Background</h5>
            <br>
        </div>

        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="elementary" type="text" >
                <label for="elementary">Elementary</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="elemattend" type="text" >
                <label for="elemattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="elemgrad" type="text" >
                <label for="elemgrad" >Year Graduated</label>
            </div>
        </div>
        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="highschool" type="text" >
                <label for="highschool">High School</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="highattend" type="text" >
                <label for="highattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="highgrad" type="text" >
                <label for="highgrad" >Year Graduated</label>
            </div>
        </div>
        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="senior" type="text" >
                <label for="senior">Senior Highschool</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="seniorattend" type="text" >
                <label for="seniorattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="seniorgrad" type="text" >
                <label for="seniorgrad" >Year Graduated</label>
            </div>
        </div>

        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="college" type="text" >
                <label for="college">College</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="collegeattend" type="text" >
                <label for="collegeattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="collegegrad" type="text" >
                <label for="collegegrad" >Year Graduated</label>
            </div>
        </div>
        <div class="row col l12">
            <div class="input-field col m8 ">
                <input  name="vocational" type="text" >
                <label for="vocational">Vocational</label>
            </div>
           
            <div class="input-field col m2">
                <input  name="vocattend" type="text" >
                <label for="vocattend" >Year Attended</label>
            </div>
            <div class="input-field col m2">
                <input  name="vocgrad" type="text" >
                <label for="vocgrad" >Year Graduated</label>
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