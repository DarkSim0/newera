
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

