@extends('student_template.master')
@section('headers')
More information 
@endsection
@section('content')
<form action="" method="POST">
    @csrf
    <div class="input-field col s12">

        <label for="entry_name">Street address/Apartement No/House No/building, floor, etc.</label>
        
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
  

    
    <div class="row col l12">
        
        <div class="col l6" >
            <div class="input-field ">
                <input  name="" type="text" >
                <label for="contactnum">Contact number</label>
            </div>
        </div>
        <div class="input-field col s6">
            <input  name="" type="text" >
            <label for="emailadd" >Landline number(optional)</label>
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