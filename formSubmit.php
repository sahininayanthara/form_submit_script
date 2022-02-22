 <script>
    $(document).ready(function() {

        
     $("form[name='editUserForm']").validate({

          rules: { 
            Username: {
                required: true,
                remote: {
                    url: "checkuser_username.php?curr_username="+$("#curr_username").val(),
                    type: "POST",
                        }
                        },
                 },
            messages: {
              Username: {
               required: "Please enter a Username",            
               remote: "Username already in use",
          },
              },

          submitHandler: function(form) {

          $("#savebt").html('Saving ...');
          $("#savebt").prop('disabled', true);
   
   
          $.ajax({
          url: "user_edit_submit.php",
          type: "POST",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function() {

          },
          success: function(data){
          $("#savebt").html('Save');
          $("#savebt").prop('disabled', false);
      
    
          swal("Good job!", "Successfully Updated User Details!", "success");
                setTimeout(
                  function() 
                    {
                     window.location.replace('view_user_edit.php?usid=<?php echo $usid_serach; ?>');
                    }, 3000);

    },
    error: function(){

     }
     });



}

});   
      
   });
    </script>