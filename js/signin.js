$(document).ready(function($) {
    
    
     $('#login-form').on('submit',function(event){
           // event.preventDefault();
            
            var email = $("#login-form #email").val();  
            var password = $("#login-form #password").val();
            
            $.ajax({
                cache: false,
                type: "POST",              
                url: "signin.php",
                data: "email=" + email + "&password=" + password,           
                dataType: 'text',
                success : function(data){
                    console.log(data);
                    $( "#notfound" ).addClass('hidden');
                    $( "#unverified" ).addClass('hidden');
                           if(data == 'success'){
                               window.location.href = 'dashboard/main.php';
                           }else if(data == 'successemployer'){
                               window.location.href = 'dashboard/employer-main.php';
                           }else if(data == 'unverifiedemployer'){
                               window.location.href = 'dashboard/employer-registrationfull.php';       
                           }else if(data == 'notfound'){
                                $( "#notfound" ).removeClass('hidden');
                           }else if(data == 'unverified'){
                                $( "#unverified" ).removeClass('hidden');
                           }
                    
                },
                error: function(data) {
                    
                }
            });
            return false;
    
     });
    
    $('#signin').click(function() {     
             $('#login-form').submit();
           
           // return false;
        });
    
    
    
});      