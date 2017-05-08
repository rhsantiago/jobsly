jQuery(document).ready(function ($) {
    
    $('#pinfo-form, #wexp-form, #etrain-hs-form, #etrain-col-form, #etrain-pgrad1-form, #skills-skilltag-form, #ainfo-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
    
    $("#add").on('click', function (event){  
    $('html, body').animate({
        scrollTop: $("#tabtitle").offset().top
        }, 2000);
    });
        
   /* 
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
    
    $('#etrain-pgrad1-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
   
    $('#skills-skilltag-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
    
    $('#ainfo-form').parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
       
    });
      */
   // $('#pinfo').click(function() {   
    $("a[href='#pinfo'], a[href='resume.php?ajax=pinfo']").on('click', function (event){  
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
    
    $('#savepinfo').on('click',function() {  
        $('#pinfo-form').submit();
     });    
    
     $(document).on('submit','#pinfonext-form',function(event){
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
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
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
    
    //$('#workexp').on('click',function() {  
      $("a[href='#workexp'], a[href='resume.php?ajax=workexp']").on('click',function (event) {  
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
                                       ['para', ['ul', 'ol', 'paragraph']]                                   
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
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
    
    $(document).on('submit','#wexpnext-form',function(event){
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
                        $('#resume-main-body #pgrad1graddate').datepicker();
                        $('#resume-main-body #successdivetrain').hide();
                        $('#etrain-hs-form #smhs').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
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
                        
                        $('#etrain-pgrad1-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                        })
                    }
        });
        return false;
    });
    
    $("a[href='#etrain'], a[href='resume.php?ajax=etrain']").on('click', function(event) {  
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
                        $('#resume-main-body #pgrad1graddate').datepicker();
                        $('#resume-main-body #successdivetrain').hide();
                        $('#etrain-hs-form #smhs').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
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
                        
                        $('#etrain-pgrad1-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                        })
                    }
        });
        return false;
    });
    
    $(document).on('submit','#etrainnext-form',function(event){
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
                    url: 'skills-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body #successdivskillstag').hide();
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #s4').addClass('active');
                        
                        
                        $('#skills-skilltag-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                            classHandler: function (el) {
                                return el.$element.closest(".form-group");
                            },
                            errorsContainer: function (el) {
                                return el.$element.closest(".form-group");
                            },

                        });
                        
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
      }); 
    
    $("a[href='#skills'], a[href='resume.php?ajax=skills']").on('click', function(event) {  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
                    url: 'skills-form.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body #successdivskillstag').hide();
                        $('#resume-main-body').html(html);                   
                        $('#resume-main-body #startdate').datepicker();                    
                        $('#resume-main-body #enddate').datepicker();
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #s4').addClass('active');
                        
                        
                        $('#skills-skilltag-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                            classHandler: function (el) {
                                return el.$element.closest(".form-group");
                            },
                            errorsContainer: function (el) {
                                return el.$element.closest(".form-group");
                            },

                        });
                        
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });
    
    $(document).on('submit','#skillsnext-form',function(event){
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
                    url: 'ainfo-form.php',
                    dataType: 'html',

                    success: function (html) {
                        $('#resume-main-body #successdivainfo').hide();
                        $('#resume-main-body').html(html);  
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #a5').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                        $('#ainfo-form').parsley({
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
    
    $("a[href='#ainfo'],a[href='resume.php?ajax=ainfo']").on('click',function(event) {  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
                    url: 'ainfo-form.php',
                    dataType: 'html',

                    success: function (html) {
                        $('#resume-main-body #successdivainfo').hide();
                        $('#resume-main-body').html(html);  
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #a5').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                        $('#resume-main-body #summernote').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']]                                   
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
                          });
                        $('#ainfo-form').parsley({
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
    
    $('#saveainfo').on('click',function() {  
        $('#ainfo-form').submit();
     });  
    
    $(document).on('submit','#ainfonext-form',function(event){
        $.ajax({
                    url: 'previewresume.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html); 
                        $('#resumesb li').removeClass('active');
                        $('#resumesb #p6').addClass('active');
                        $(function() {
                            $.material.init();
                        });
                    }
        });
        return false;
    });    
    
    $("a[href='#pres']").on('click',function(event) {  
        $.ajax({
                    url: 'previewresume.php',
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $('#resume-main-body').html(html); 
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
                 // console.log(data);
                    $('#successdivpinfo').fadeIn(1500);
                    $('#pinfo-form').parsley().reset();
                    $('#mode').val('update');
                    //$("a[href='#workexp']").trigger('click');
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
        
            var currentempcb = 'off';
            if($("#wexp-form #currentempcb").prop('checked')==true){
               currentempcb = 'on';
            }
             var jobdesc = $('#wexp-form-modal #summernote').summernote('code');
            
        
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "wexp-submit.php",
                data: "id=" + id + "&mode=" + mode + "&userid=" + userid + "&company=" + company + "&position=" + position + "&startdate=" + startdate + "&msalary=" + msalary + "&industry=" + industry + "&plevel=" + plevel + "&enddate=" + enddate + "&currentempcb=" + currentempcb + "&jobdesc=" + jobdesc,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                success : function(data){
                    if(mode=='del'){
                        $('#workexp-modal').modal('toggle');
                    }
                    $('#workexpcardsdiv').html(data).fadeIn(1500);               
                    $('#wexp-form-modal #successdivworkexp').fadeIn(1500);
                    $(function() {
                            $.material.init();
                     });
                    $('#resume-main-body #summernote').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
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
            $('#successdivworkexp').hide();
            var mode = $("#wexp-form #mode").val();
            var userid = $("#wexp-form #userid").val();  
            var company = $("#wexp-form #company").val();
            var position = $("#wexp-form #position").val();
            var startdate = $("#wexp-form #startdate").val();
        
            var msalary = $("#wexp-form #msalary").val();       
            var industry = $("#wexp-form #industry").val();
            var plevel = $("#wexp-form #plevel").val();
            var enddate = $("#wexp-form #enddate").val();
            var currentempcb = 'off';
            if($("#wexp-form #currentempcb").prop('checked')==true){
               currentempcb = 'on';
            }
           
             var jobdesc = $('#wexp-form #summernote').summernote('code');
            
            
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "wexp-submit.php",
                data: "mode=" +mode + "&userid=" + userid + "&company=" + company + "&position=" + position + "&startdate=" + startdate + "&msalary=" + msalary + "&industry=" + industry + "&plevel=" + plevel + "&enddate=" + enddate + "&currentempcb=" + currentempcb + "&jobdesc=" + jobdesc,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                success : function(data){
                    $('#workexpcardsdiv').html(data).fadeIn(1500);
                    $('#successdivworkexp').fadeIn(1500);
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
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
                          });
                    $("#wexp-form #company").val('');
                    $("#wexp-form #position").val('');
                    $("#wexp-form #startdate").val('');
                    $("#wexp-form #msalary").val('');       
                    $("#wexp-form #industry").val('');
                    $("#wexp-form #plevel").val('');
                    $("#wexp-form #enddate").val('');
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
                    $('#resume-main-body #pgrad1graddate').datepicker();
                    $('#resume-main-body #smhs').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
                          });
                 
                    $('#etrain-hs-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                     });
                    $('#etrain-hs-form #mode').val('update');
                    $('#etrain-col-form #mode').val('update');
                    $('#etrain-pgrad1-form #mode').val('update');
                    $('#etrain-others-form #mode').val('update'); 
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
                    $('#resume-main-body #pgrad1graddate').datepicker();
                    $('#resume-main-body #smcol').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
                          });
                    $('#etrain-col-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                     });
                    $('#etrain-hs-form #mode').val('update');
                    $('#etrain-col-form #mode').val('update');
                    $('#etrain-pgrad1-form #mode').val('update');
                    $('#etrain-others-form #mode').val('update');
                    $('#etrain-col-form').parsley().reset();
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    $(document).on('submit','#etrain-pgrad1-form',function(event){
             
            event.preventDefault();      
            $('.features #successdivetrain').hide();
            var id = $("#etrain-pgrad1-form #id").val();
            var etrain = $("#etrain-pgrad1-form #etrain").val();
            var mode = $("#etrain-pgrad1-form #mode").val();
            var userid = $("#etrain-pgrad1-form #userid").val();
                  
            var pgrad1uni = $("#etrain-pgrad1-form #pgrad1uni").val();
            var pgrad1add = $("#etrain-pgrad1-form #pgrad1add").val();
            var pgrad1gpa = $("#etrain-pgrad1-form #pgrad1gpa").val();
            var pgrad1graddate = $("#etrain-pgrad1-form #pgrad1graddate").val();
            var pgrad1course = $("#etrain-pgrad1-form #pgrad1course").val();
            var smpgrad1 = $("#etrain-pgrad1-form #smpgrad1").summernote('code');
        
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "etrain-submit.php",
                data: "mode=" +mode + "&etrain=" + etrain + "&userid=" + userid + "&pgrad1uni=" + pgrad1uni + "&pgrad1add=" + pgrad1add + "&pgrad1gpa=" + pgrad1gpa + "&pgrad1graddate=" + pgrad1graddate + "&pgrad1course=" + pgrad1course + "&smpgrad1=" + smpgrad1,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    console.log(data);
                   // $('#etrain-form #workexpcardsdiv').html(data).fadeIn(1500);
                    $('.features #successdivetrain').fadeIn(1500);  
                    $('#resume-main-body #hsgraddate').datepicker();
                    $('#resume-main-body #colgraddate').datepicker();
                    $('#resume-main-body #pgrad1graddate').datepicker();
                   
                    $('#resume-main-body #smpgrad1').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
                          });
                    $('#etrain-pgrad1-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                     });
                    $('#etrain-hs-form #mode').val('update');
                    $('#etrain-col-form #mode').val('update');
                    $('#etrain-pgrad1-form #mode').val('update');
                    $('#etrain-others-form #mode').val('update');
                    $('#etrain-pgrad1-form').parsley().reset();
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
     $(document).on('submit','#etrain-others-form',function(event){
             
            event.preventDefault();      
            $('.features #successdivetrain').hide();
            var id = $("#etrain-others-form #id").val();
            var etrain = $("#etrain-others-form #etrain").val();
            var mode = $("#etrain-others-form #mode").val();
            var userid = $("#etrain-others-form #userid").val();
           
            var smothers = $("#etrain-others-form #smothers").summernote('code');
        
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "etrain-submit.php",
                data: "mode=" +mode + "&etrain=" + etrain + "&userid=" + userid + "&smothers=" + smothers,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    console.log(data);
                   // $('#etrain-form #workexpcardsdiv').html(data).fadeIn(1500);
                    $('.features #successdivetrain').fadeIn(1500);  
                    $('#resume-main-body #hsgraddate').datepicker();
                    $('#resume-main-body #colgraddate').datepicker();
                    $('#resume-main-body #pgrad1graddate').datepicker();
                   
                    $('#resume-main-body #smothers').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                       ['para', ['ul', 'ol', 'paragraph']],
                                       ['height', ['height']]
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
                          });
                   
                    $('#etrain-hs-form #mode').val('update');
                    $('#etrain-col-form #mode').val('update');
                    $('#etrain-pgrad1-form #mode').val('update');
                    $('#etrain-others-form #mode').val('update');                
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    
    $(document).on('submit','#skills-skilltag-form',function(event){
             
            event.preventDefault();      
            $('.features #successdivskillstag').hide();
            var id = $("#skills-skilltag-form #id").val();
            var skills = $("#skills-skilltag-form #skills").val();
            var mode = $("#skills-skilltag-form #mode").val();
            var userid = $("#skills-skilltag-form #userid").val();
            var skill = $("#skills-skilltag-form #skill").val();
           // var skilltag = $("#skills-skilltag-form #skilltag").val();
            var trimmed = $("#skills-skilltag-form #skill").val();
            trimmed = trimmed.replace(/\s+/g, '');          
            var skilltag = '#' + trimmed;
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "skills-submit.php",
                data: "mode=" +mode + "&skills=" + skills + "&userid=" + userid + "&skill=" + skill + "&skilltag=" + skilltag,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    
                    $('.features #skilltagsdiv').html(data).fadeIn(1500);
                    $('.features #successdivskillstag').fadeIn(1500);  
                    $("#skills-skilltag-form #skill").val('');           
                    $(' #skills-skilltag-form #mode').val('insert'); 
                    $("#skills-skilltag-form").parsley().reset();
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    $(document).on('submit','#ainfo-form',function(event){
             
            event.preventDefault();
            $('#ainfo-form #successdivainfo').hide();
            var mode = $("#ainfo-form #mode").val();
            var userid = $("#ainfo-form #userid").val();  
            var dposition = $("#ainfo-form #dposition").val();
            var specialization = $("#ainfo-form #specialization").val();
            var plevel = $("#ainfo-form #plevel").val();
        
            var esalary = $("#ainfo-form #esalary").val();       
            var pworkloc = $("#ainfo-form #pworkloc").val();
            var yexp = $("#ainfo-form #yexp").val();
            var languages = $("#ainfo-form #languages").val();
            var wtravel = 'off';
            if($("#ainfo-form #wtravel").prop('checked')==true){
               wtravel = 'on';
            }           
            var wrelocate = 'off';
            if($("#ainfo-form #wrelocate").prop('checked')==true){
               wrelocate = 'on';
            }
        
            var pholder = 'off';
            if($("#ainfo-form #pholder").prop('checked')==true){
               pholder = 'on';
            }            
            var profsum = $('#ainfo-form #summernote').summernote('code');
            $.ajax({
                cache: false,
                type: "POST",              
                url: "ainfo-submit.php",
                data: "mode=" +mode + "&userid=" + userid + "&dposition=" + dposition + "&specialization=" + specialization + "&plevel=" + plevel + "&esalary=" + esalary + "&pworkloc=" + pworkloc + "&yexp=" + yexp + "&wtravel=" + wtravel + "&wrelocate=" + wrelocate + "&pholder=" + pholder + "&languages=" + languages + "&profsum=" + profsum,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){              
                    $('#successdivainfo').fadeIn(1500);
                    $('#ainfo-form #mode').val('update');
                    $('#ainfo-form').parsley().reset();
                     $(function() {
                            $.material.init();
                        });
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    
    
    
    $('#workexp-modal').on('shown.bs.modal', function(e) {

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
                $('#wexp-form-modal-edit #startdate').datepicker();
                $('#wexp-form-modal-edit #enddate').datepicker();
                
              $modal.find('#successdivworkexp').hide();
                $('#wexp-form-modal').parsley({
                       successClass: "has-success",
                       errorClass: "has-error"
                });
                    
            }
        });
    });
    
    $('#skills-modal-del').on('show.bs.modal', function(e) {
               $('.features #successdivskillstag').hide();
               var $modal = $(this);
               var skilltag =  $(e.relatedTarget).data('skilltag');
               var skillid =  $(e.relatedTarget).data('skillid');
               var userid = $(e.relatedTarget).data('userid');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'skills-modal-del.php',
            data: 'skillid=' + skillid +
                  '&userid=' + userid +
                  '&skilltag=' + skilltag,
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $(function() {
                           $.material.init();
                    });          
            }
        });
    });
    
    $(document).on('submit','#delskill-form',function(event){
             
            event.preventDefault();      
            $('#resume-main-body #successdivdeljob').hide();   
            var userid = $("#delskill-form #userid").val();          
            var skillid = $("#delskill-form #skillid").val();         
         
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "delskill-submit.php",
                data: "userid=" + userid + "&skillid=" + skillid,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    
                    $('#skills-modal-del').modal('toggle');
                    $("#skilltagsdiv #"+data).remove();
                    $(function() {
                         $.material.init();
                    });
                 
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    $('#currentempcb').click(function(){
        if($(this).is(":checked")){
           $("#enddate").attr("disabled" , "disabled");
           $('#enddate').removeAttr('data-parsley-required');           
        }
        else{
           $("#enddate").removeAttr("disabled");
           $('#enddate').attr('data-parsley-required', '');    
           
        }
    });
    
    $(document).on('click','#printable',function(event){
         event.preventDefault();
         $('#printable-form').submit();
    });
 /*   
    $(document).on('submit','#printable-form',function(event){
            event.preventDefault();
            var userid = $("#printable-form #userid").val();
            window.open("printableresume.php, '_blank');
    });    
  
    $(document).on('click','#photo-modal',function(event) {
            var applicantid =  $(this).data('applicantid');
            var jobid =  $(this).data('jobid');
            var mode =  $(this).data('mode');
            $('#shortlist-form #applicantid').val(applicantid);
            $('#shortlist-form #jobid').val(jobid);
            $('#shortlist-form #mode').val(mode);
            $('#shortlist-form').submit();
    });
   */
    
});   

 