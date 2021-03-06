$(document).ready(function($) {
    $('#pinfo').click(function() {  
        $.ajax({
                    url: 'personalinfo-form.php',
                    dataType: 'html',

                    success: function (html) {
                        console.log(html);
                        $('#resume-main-body').html(html);
                        //$('#loading').hide();
                    }
        });
        return false;
    });
    
    $('#workexp').click(function() {  
        $.ajax({
                    url: 'workexperience-form.php',
                    dataType: 'html',

                    success: function (html) {
                        console.log(html);
                        $('#resume-main-body').html(html);
                        //$('#loading').hide();
                    }
        });
        return false;
    });
    
    $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
    
    $(document).on('submit','#pinfo-form',function(event){
             
            event.preventDefault();
            var userid = $("#pinfo-form #userid").val();  
            var fname = $("#pinfo-form #fname").val();
            var lname = $("#pinfo-form #lname").val();
            var mname = $("#pinfo-form #mname").val();
        
            var street = $("#pinfo-form #street").val();
            var city = $("#pinfo-form #city").val();
            var province = $("#pinfo-form #province").val();
            var country = $("#pinfo-form #country").val();
        
            var mnumber = $("#pinfo-form #mnumber").val();
            var myemail = $("#pinfo-form #myemail").val();
            var landline = $("#pinfo-form #landline").val();
        
            var age = $("#pinfo-form #age").val();
            var birthday = $("#pinfo-form #birthday").val();
            var gender = $("#pinfo-form #gender").val();
            var nationality = $("#pinfo-form #nationality").val();
        
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "pinfo-submit.php",
                data: "userid=" + userid + "&fname=" + fname + "&lname=" + lname + "&mname=" + mname + "&street=" + street + "&city=" + city + "&province=" + province + "&country=" + country + "&mnumber=" + mnumber + "&myemail=" + myemail + "&landline=" + landline + "&age=" + age + "&birthday=" + birthday + "&gender=" + gender + "&nationality=" + nationality,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                  console.log(data);
                
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    
    
    
});    