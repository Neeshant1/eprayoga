  $(document).ready(function() {
    $('#pwdsubmit').on('click',function(e) {
      e.preventDefault();
      var password = $("#password").val();
      var confirmPassword = $("#password-confirm").val();
      if (password !== confirmPassword) {
       // alert("Passwords do not match."); 
        $('#psw_confirm_error').html("Passwords do not match.");
           $('#password').on('click',function(e){
                e.preventDefault();
              $('#psw_confirm_error').html("");
                $('#password').val("");
              $('#password-confirm').val("");
           });
        return false;
      }  
      if((password.length > 10 || password.length < 6) && (confirmPassword.length > 10 || confirmPassword.length < 6)) {
      // alert("make sure the password is between 6-10 characters long");
          $('#psw_confirm_error').html("make sure the password is between 6-10 characters long.");
          $('#password').click(function(e){
                e.preventDefault();
              $('#psw_confirm_error').html("");
              $('#password').empty();
                $('#password').empty();
           });
        return false;       
      }
      
        swal({
            title: 'Good job!',
            text: 'Password Resetting Successfully',
            type: 'success',
            confirmButtonClass: 'btn-raised btn-success',
            confirmButtonText: 'OK',
          },function(confirmButtonText){
          if(confirmButtonText){
                $( "#target_form" ).submit();
          }
        });
        
     // $( "#target_form" ).submit();
    });
  });   