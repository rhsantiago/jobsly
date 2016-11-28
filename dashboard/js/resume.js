jQuery(document).ready(function ($) {
    
    
   // $('#pinfo').click(function() {   
    $("a[href='#pinfo']").on('click', function (){  
        event.preventDefault()
        event.stopPropagation();
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
    
    //$('#workexp').on('click',function() {  
      $("a[href='#workexp']").on('click',function () {  
           event.preventDefault()
           event.stopPropagation();
           
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
                        $('#resume-main-body #summernote').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ]
                          });
                        $('#wexp-form #successdivworkexp').hide();                                                   
                        $(function() {
                            $.material.init();
                        });
                        
                    }
        });
        return false;
    });
    
    $("a[href='#etrain']").on('click', function() {  
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
    
    $("a[href='#skills']").on('click', function() {  
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
/*    
    $('#pinfo').on('click touchstart', function() {  
        $.ajax({
                    url: 'pinfo-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                    
                        $('#resume-main-body #birthday').datepicker();                        
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    $('#workexp').on('click touchstart', function() {       
        $.ajax({
                    url: 'wexp-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();                       
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
*/
       
    $(document).on('submit','#pinfo-form',function(event){
             
            event.preventDefault();
            $('#successdivpinfo').hide();
            var id = $("#pinfo-form #id").val();
            var mode = $("#pinfo-form #mode").val();
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
                data: "mode=" + mode + "&id=" + id + "&userid=" + userid + "&fname=" + fname + "&lname=" + lname + "&mname=" + mname + "&street=" + street + "&city=" + city + "&province=" + province + "&country=" + country + "&mnumber=" + mnumber + "&myemail=" + myemail + "&landline=" + landline + "&age=" + age + "&birthday=" + birthday + "&gender=" + gender + "&nationality=" + nationality,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                  console.log(data);
                    $('#successdivpinfo').fadeIn(1500);
                    $('#mode').val('update');                   
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    $(document).on('submit','#wexp-form-modal',function(event){
            event.preventDefault();
            $('#wexp-form #workexpcardsdiv').hide();
            $('#wexp-form-modal #successdivworkexp').hide();
            var id = $("#wexp-form-modal #id").val();
            var mode = $("#wexp-form-modal #mode").val();
            var userid = $("#wexp-form-modal #userid").val();  
            var company = $("#wexp-form-modal #company").val();
            var position = $("#wexp-form-modal #position").val();
            var startdate = $("#wexp-form-modal #startdate").val();
        
            var msalary = $("#wexp-form-modal #msalary").val();       
            var industry = $("#wexp-form-modal #industry").val();
            var plevel = $("#wexp-form-modal #plevel").val();
            var enddate = $("#wexp-form-modal #enddate").val();
        
            var currentempcb = $("#wexp-form-modal #currentempcb").val();
             var jobdesc = $('#wexp-form-modal #summernote').summernote('code');
            
        
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "wexp-submit.php",
                data: "id=" + id + "&mode=" + mode + "&userid=" + userid + "&company=" + company + "&position=" + position + "&startdate=" + startdate + "&msalary=" + msalary + "&industry=" + industry + "&plevel=" + plevel + "&enddate=" + enddate + "&currentempcb=" + currentempcb + "&jobdesc=" + jobdesc,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    $('#wexp-form #workexpcardsdiv').html(data).fadeIn(1500);               
                    $('#wexp-form-modal #successdivworkexp').fadeIn(1500);
                    $('#resume-main-body #summernote').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ]
                          });
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
       
    
    $(document).on('submit','#wexp-form',function(event){
             
            event.preventDefault();
            $('#wexp-form #workexpcardsdiv').hide();
            $('#wexp-form #successdivworkexp').hide();
            var mode = $("#wexp-form #mode").val();
            var userid = $("#wexp-form #userid").val();  
            var company = $("#wexp-form #company").val();
            var position = $("#wexp-form #position").val();
            var startdate = $("#wexp-form #startdate").val();
        
            var msalary = $("#wexp-form #msalary").val();       
            var industry = $("#wexp-form #industry").val();
            var plevel = $("#wexp-form #plevel").val();
            var enddate = $("#wexp-form #enddate").val();
        
            var currentempcb = $("#wexp-form #currentempcb").val();
             var jobdesc = $('#wexp-form #summernote').summernote('code');
            
        
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "wexp-submit.php",
                data: "mode=" +mode + "&userid=" + userid + "&company=" + company + "&position=" + position + "&startdate=" + startdate + "&msalary=" + msalary + "&industry=" + industry + "&plevel=" + plevel + "&enddate=" + enddate + "&currentempcb=" + currentempcb + "&jobdesc=" + jobdesc,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    $('#wexp-form #workexpcardsdiv').html(data).fadeIn(1500);
                    $('#wexp-form #successdivworkexp').fadeIn(1500);
                    $('#resume-main-body #startdate').datepicker();                    
                    $('#resume-main-body #enddate').datepicker();
                    $('#resume-main-body #summernote').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ]
                          });
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    
    $('#workexp-modal').on('show.bs.modal', function(e) {

        var $modal = $(this),
          
               workexpid =  $(e.relatedTarget).data('workexpid');
               userid = $(e.relatedTarget).data('userid');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'wexp-modal.php',
            data: 'workexpid=' + workexpid +
                  '&userid=' + userid,
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $(function() {
                           $.material.init();
                    });
                $('#successdivworkexp').hide();
                  //  $('#modaleditworkexp #startdate').datepicker();                    
                 //   $('#modaleditworkexp #enddate').datepicker();
                    
            }
        });
    });
    
});   

 