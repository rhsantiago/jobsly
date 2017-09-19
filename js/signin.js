$(document).ready(function($) {
    
    
     $('#login-form').on('submit',function(event){
           // event.preventDefault();
            $( "#notfound" ).addClass('hidden');       
            $( "#unverified" ).addClass('hidden');
            $('#loader').hide();
            var email = $("#login-form #email").val();  
            var password = $("#login-form #password").val();
            
            $.ajax({
                cache: false,
                type: "POST",              
                url: "signin.php",
                data: "email=" + email + "&password=" + password,           
                dataType: 'text',
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                  },
                success : function(data){
                    console.log(data);
                    $( "#notfound" ).addClass('hidden');
                    $( "#unverified" ).addClass('hidden');
                           if(data == 'success'){
                               window.location.href = 'dashboard/jobseeker-home.php';
                           }else if(data == 'successemployer'){
                               window.location.href = 'dashboard/employer-home.php';
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
    
    $('#sendresetlink-form').on('submit',function(event){
           // event.preventDefault();
            $( "#notfound" ).addClass('hidden');
            $( "#success" ).addClass('hidden');          
            $('#loader').hide();
            var email = $("#sendresetlink-form #email").val();  
           
            $.ajax({
                cache: false,
                type: "POST",
                url: "sendresetlink.php",
                data: "email=" + email,
                dataType: 'text',
                 beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                         $('#loader').hide();
                      },
                success : function(data){                  
                    $( "#notfound" ).addClass('hidden');
                    $( "#success" ).addClass('hidden');
                           if(data == 'success'){
                               $( "#success" ).removeClass('hidden');
                           }else if(data == 'notfound'){
                               $( "#notfound" ).removeClass('hidden');
                           }
                    
                },
                error: function(data) {
                    
                }
            });
            return false;
    
     });
    
    $('#resetpw-form').on('submit',function(event){
           // event.preventDefault();
            $( "#notfound" ).addClass('hidden');
            $( "#pwsuccess" ).addClass('hidden');
            $('#loader').hide();
            var email = $("#resetpw-form #email").val();
            var password = $("#resetpw-form #password").val();
            var password2 = $("#resetpw-form #password2").val();
            var verifyhash = $("#resetpw-form #verifyhash").val();
                
            if(password==password2){
            $.ajax({
                cache: false,
                type: "POST",
                url: "resetpw.php",
                data: "email=" + email + "&verifyhash=" + verifyhash + "&password=" +password + "&password2=" + password2,
                dataType: 'text',
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                  },
                success : function(data){
                    console.log(data);
                    $( "#notfound" ).addClass('hidden');
                    $( "#pwsuccess" ).addClass('hidden');
                           if(data == 'pwsuccess'){
                               $( "#pwsuccess" ).removeClass('hidden');
                           }else if(data == 'notfound'){
                               $( "#notfound" ).removeClass('hidden');
                           }
                    
                },
                error: function(data) {
                    
                }
            });
            return false;
            }else{
                $( "#pwnotmatch" ).addClass('hidden');
                $( "#pwsuccess" ).addClass('hidden');
                $( "#pwnotmatch" ).removeClass('hidden');
                 return false;
            }
    
     });
    
    $('#forgot').click(function() {     
             window.location.href = 'forgot.php?mode=forgot';
           
           // return false;
        });
    
    
    
});      