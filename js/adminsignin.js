$(document).ready(function($) {
    
    
     $('#adminlogin-form').on('submit',function(event){
           // event.preventDefault();
            
            var email = $("#adminlogin-form #email").val();  
            var password = $("#adminlogin-form #password").val();
            
            $.ajax({
                cache: false,
                type: "POST",              
                url: "admin-signin.php",
                data: "email=" + email + "&password=" + password,           
                dataType: 'text',
                success : function(data){
                    console.log(data);                   
                 
                           if(data == 'successadmin'){
                               window.location.href = 'dashboard/admin-home.php';
                           }
                    
                },
                error: function(data) {
                    
                }
            });
            return false;
    
     });
    
    $('#adminsignin').click(function() {     
             $('#adminlogin-form').submit();
           
           // return false;
        });
    
    
    
});      