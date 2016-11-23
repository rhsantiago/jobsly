$(document).ready(function($) {
    
     $("a[href='#pinfo']").on('click',function() {  
        $.ajax({
                    url: 'pinfo-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                    
                        $('#resume-main-body #birthday').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #p1').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
   // $('#workexp').on('click',function() {  
      $("a[href='#workexp']").on('click',function() {  
        $.ajax({
                    url: 'wexp-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #w2').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    $("a[href='#etrain']").on('click',function() {  
        $.ajax({
                    url: 'wexp-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #e3').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    $("a[href='#skills']").on('click',function() {  
        $.ajax({
                    url: 'wexp-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #s4').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    $("a[href='#ainfo']").on('click',function() {  
        $.ajax({
                    url: 'wexp-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #a5').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    $("a[href='#pres']").on('click',function() {  
        $.ajax({
                    url: 'wexp-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #p6').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    
   
    
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
    
    $(document).on('submit','#wexp-form',function(event){
             
            event.preventDefault();
            var userid = $("#wexp-form #userid").val();  
            var company = $("#wexp-form #company").val();
            var position = $("#wexp-form #position").val();
            var startdate = $("#wexp-form #startdate").val();
        
            var msalary = $("#wexp-form #msalary").val();       
            var industry = $("#wexp-form #industry").val();
            var plevel = $("#wexp-form #plevel").val();
            var enddate = $("#wexp-form #enddate").val();
        
            var currentempcb = $("#wexp-form #currentempcb").val();
            
        
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "wexp-submit.php",
                data: "userid=" + userid + "&company=" + company + "&position=" + position + "&startdate=" + startdate + "&msalary=" + msalary + "&industry=" + industry + "&plevel=" + plevel + "&enddate=" + enddate + "&currentempcb=" + currentempcb,
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