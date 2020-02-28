@extends('student_template.master')
@section('headers')
Contact Information   
@endsection
@section('content')
<form action="" method="POST">
    @csrf
    <div class="input-field col s12">

        <label for="entry_name">Street No/Apartement No/House No</label>
        
        <input type="text" class="validate" >
    </div>

    <div class="row col l12" >
        <div class="input-field col m6">
            <input id="province" type="text" name="" class="validate" autocomplete="off">
            <label for="province">Town/Province/Zipcode/Region</label>
            <div id="listProvince">
            </div>
        </div>
        <div class="input-field col m6">
            <input type="text" id="email" class="validate" >
            <label for="E-mail">E-mail Address</label>
        </div>
    </div>
  
    <div class="row col l12" >
   
    
        <div class="input-field col s4">
            <input  id="age" name="age" type="text" class="validate">
            <label for="age">Age</label>
        </div>

        <div class="input-field col l4">
            <input id="birthdate" name="dob" type="text" class="datepicker">
            <label for="birthdate">Birthdate</label>
        </div>
    </div>

    
    <div class="row col l12">
        
        <div class="col l6" >
            <div class="input-field ">
                <input  name="birth_place" type="text" >
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