jQuery(document).ready(function ($) {
    
    $('#pinfo-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
        
    
    $('#wexp-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
   
    $('#etrain-hs-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
    
    $('#etrain-col-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
  
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
                     $('#pinfo-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                            classHandler: function (el) {
                                return el.$element.closest(".form-group");
                            },
                            errorsContainer: function (el) {
                                return el.$element.closest(".form-group");
                            },
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
                        $('#wexp-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                        });
                        
                        
                        
                    }
        });
        return false;
    });
    
    $("a[href='#etrain']").on('click', function() {  
        event.preventDefault()
           event.stopPropagation();
        $.ajax({
                    url: 'etrain-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html);
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #e3').addClass('active');
                        $('#etrain-hs-form #hsgraddate').datepicker();                    
                        $('#resume-main-body #colgraddate').datepicker();
                       // $('#resume-main-body #pgrad1graddate').datepicker();
                        $('.features #successdivetrain').hide();
                        $('#etrain-hs-form #smhs').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ]
                          });
                         $(function() {
                            $.material.init();
                        });
                        $('#etrain-hs-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                        });
                        
                        $('#etrain-col-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
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
                    $('#pinfo-form').parsley().reset();
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
                    $('#wexp-form').parsley().reset();
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    $(document).on('submit','#etrain-hs-form',function(event){
             
            event.preventDefault();      
            $('.features #successdivetrain').hide();
            var id = $("#etrain-hs-form #id").val();
            var etrain = $("#etrain-hs-form #etrain").val();
            var mode = $("#etrain-hs-form #mode").val();
            var userid = $("#etrain-hs-form #userid").val();
            var hsschool = $("#etrain-hs-form #hsschool").val();
            var hsadd = $("#etrain-hs-form #hsadd").val();  
            var hsgraddate = $("#etrain-hs-form #hsgraddate").val();
            var smhs = $("#etrain-hs-form #smhs").summernote('code');        
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "etrain-submit.php",
                data: "mode=" + mode + "&etrain=" + etrain + "&userid=" + userid + "&hsschool=" + hsschool + "&hsadd=" + hsadd + "&hsgraddate=" + hsgraddate + "&smhs=" + smhs, 
                dataType: 'text',
                success : function(data){
                    console.log(data);
                   // $('#wexp-form #workexpcardsdiv').html(data).fadeIn(1500);
                    $('.features #successdivetrain').fadeIn(1500);
                    $('#resume-main-body #hsgraddate').datepicker();
                    $('#resume-main-body #colgraddate').datepicker();
                    $('#resume-main-body #smhs').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ]
                          });
                 
                    $('#etrain-hs-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                     });
                    $('#etrain-hs-form #mode').val('update');
                    $('#etrain-hs-form').parsley().reset();
                },
                error: function(data) {
                    console.log(data);
                   // $('#wexp-form #successdivetrain').fadeIn(1500);
                   
                }
            });
            return false;
    });
    
    
    $(document).on('submit','#etrain-col-form',function(event){
             
            event.preventDefault();      
            $('.features #successdivetrain').hide();
            var id = $("#etrain-col-form #id").val();
            var etrain = $("#etrain-col-form #etrain").val();
            var mode = $("#etrain-col-form #mode").val();
            var userid = $("#etrain-col-form #userid").val();
                  
            var coluni = $("#etrain-col-form #coluni").val();
            var coladd = $("#etrain-col-form #coladd").val();
            var colgpa = $("#etrain-col-form #colgpa").val();
            var colgraddate = $("#etrain-col-form #colgraddate").val();
            var colmajor = $("#etrain-col-form #colmajor").val();
            var smcol = $("#etrain-col-form #smcol").summernote('code');
        
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "etrain-submit.php",
                data: "mode=" +mode + "&etrain=" + etrain + "&userid=" + userid + "&coluni=" + coluni + "&coladd=" + coladd + "&colgpa=" + colgpa + "&colgraddate=" + colgraddate + "&colmajor=" + colmajor + "&smcol=" + smcol,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    console.log(data);
                   // $('#etrain-form #workexpcardsdiv').html(data).fadeIn(1500);
                    $('.features #successdivetrain').fadeIn(1500);  
                    $('#resume-main-body #hsgraddate').datepicker();
                    $('#resume-main-body #colgraddate').datepicker();                   
                   
                    $('#resume-main-body #smcol').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ]
                          });
                    $('#etrain-col-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                     });
                    $(' #etrain-col-form #mode').val('update');
                    $('#etrain-col-form').parsley().reset();
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    
    
    
    $('#workexp-modal').on('show.bs.modal', function(e) {

        var $modal = $(this),
               mode =  $(e.relatedTarget).data('mode');
               workexpid =  $(e.relatedTarget).data('workexpid');
               userid = $(e.relatedTarget).data('userid');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'wexp-modal.php',
            data: 'workexpid=' + workexpid +
                  '&userid=' + userid +
                  '&mode=' + mode,
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $(function() {
                           $.material.init();
                    });
                $('#successdivworkexp').hide();
                $('#wexp-form-modal').parsley({
                       successClass: "has-success",
                       errorClass: "has-error"
                });
                    
            }
        });
    });
    
    
    
   
    
});   

 