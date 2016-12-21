jQuery(document).ready(function ($) {
    
    $("a[href='#pjobad']").on('click', function (){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'selecttemplate-form.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    $('#resume-main-body #startappdate').datepicker();
                    $('#resume-main-body #endappdate').datepicker();
                    $('#resume-main-body #jobdesc').summernote({
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
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #p2').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
    });
    
    $("a[href='#jtemp']").on('click', function (){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'templates.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #j3').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
    });
    
     $(document).on('submit','#selecttemplate-form',function(event){
             
            event.preventDefault();      
      
            var id = $("#selecttemplate-form #id").val();
            var template = $("#selecttemplate-form #template").val();
            var mode = $("#selecttemplate-form #mode").val();
            var userid = $("#selecttemplate-form #userid").val();
          
            $.ajax({
                cache: false,
                type: "POST",              
                url: "selecttemplate-submit.php",
                data: "mode=" +mode + "&template=" + template + "&userid=" + userid,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                success : function(data){                 
                    $('#resume-main-body').html(data).fadeIn(1500);
                    $('#resume-main-body #startappdate').datepicker();
                    $('#resume-main-body #endappdate').datepicker();
                    $('#resume-main-body #jobdesc').summernote({
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
                    $(function() {
                         $.material.init();
                    });
                    $('#postajob-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                            classHandler: function (el) {
                                return el.$element.closest(".form-group");
                            },
                            errorsContainer: function (el) {
                                return el.$element.closest(".form-group");
                            },
                     });
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    $(document).on('submit','#postajob-form',function(event){
             
            event.preventDefault();      
      
            var jobid = $("#postajob-form #jobid").val();
            var templateid = $("#postajob-form #templateid").val();
            var jobtitle = $("#postajob-form #jobtitle").val();
            var mode = $("#postajob-form #mode").val();
            var userid = $("#postajob-form #userid").val();
            var specialization = $("#postajob-form #specialization").val();
            var plevel = $("#postajob-form #plevel").val();
            var jobtype = $("#postajob-form #jobtype").val();
            var msalary = $("#postajob-form #msalary").val();
            var maxsalary = $("#postajob-form #maxsalary").val();
            var startappdate = $("#postajob-form #startappdate").val();
            var endappdate = $("#postajob-form #endappdate").val();
            var nvacancies = $("#postajob-form #nvacancies").val();
            var jobdesc = $("#postajob-form #jobdesc").summernote('code');
            var city = $("#postajob-form #city").val();
            var province = $("#postajob-form #province").val();
            var country = $("#postajob-form #country").val();
            var yrsexp = $("#postajob-form #yrsexp").val();
            var mineduc = $("#postajob-form #mineduc").val();
            var prefcourse = $("#postajob-form #prefcourse").val();
            var languages = $("#postajob-form #languages").val();
            var licenses = $("#postajob-form #licenses").val();                     
            var wtravel = 'off';
            if($("#postajob-form #wtravel").prop('checked')==true){
               wtravel = 'on';
            }
            var wrelocate = 'off';
            if($("#postajob-form #wrelocate").prop('checked')==true){
               wrelocate = 'on';
            }
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "postajob-submit.php",
                data: "jobid=" + jobid + "&templateid=" + templateid + "&mode=" +mode + "&userid=" + userid + "&jobtitle=" + jobtitle + "&specialization=" + specialization +"&plevel=" + plevel + "&jobtype=" + jobtype + "&msalary=" + msalary + "&maxsalary=" + maxsalary + "&startappdate=" + startappdate + "&endappdate=" + endappdate + "&nvacancies=" + nvacancies + "&jobdesc=" + jobdesc + "&city=" + city + "&province=" + province + "&country=" + country + "&yrsexp=" + yrsexp + "&mineduc=" + mineduc + "&prefcourse=" + prefcourse + "&languages=" + languages + "&licenses=" + licenses + "&wtravel=" + wtravel + "&wrelocate=" + wrelocate,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                success : function(data){                 
                    $('#resume-main-body').html(data).fadeIn(1500); 
                    $('#resume-main-body #successdivjobskillstag').hide();
                    $(function() {
                         $.material.init();
                    });
                    $('#jobskills-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                     });
                     var options = {
                        url: "json/skilltags.json",
                        getValue: "name",
                        list: {
                            match: {
                                enabled: true
                                   }
                               }
                    }
                    $("#jobskill").easyAutocomplete(options);
                },
                error: function(data) {
                    console.log(data); 
                }
            });
            return false;
    });
    
    
    $(document).on('submit','#jobskills-form',function(event){
             
            event.preventDefault();      
            $('#resume-main-body #successdivjobskillstag').hide();
            var jobid = $("#jobskills-form #jobid").val();           
            var mode = $("#jobskills-form #mode").val();
            var userid = $("#jobskills-form #userid").val();          
            var jobskill = $("#jobskills-form #jobskill").val();         
            var trimmed = $("#jobskills-form #jobskill").val();
            trimmed = trimmed.replace(/\s+/g, '');          
            var jobskilltag = '#' + trimmed;
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "jobskills-submit.php",
                data: "mode=" +mode + "&userid=" + userid + "&jobid=" + jobid +"&jobskill=" + jobskill + "&jobskilltag=" + jobskilltag,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    console.log(data);
                    $('.features #jobskilltagsdiv').html(data).fadeIn(1500);
                    $('.features #successdivjobskillstag').fadeIn(1500);  
                                
                    $(' #jobskills-form #mode').val('insert');
                    $(function() {
                         $.material.init();
                    });
                    $("#jobskill").easyAutocomplete(options);
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    
    $("#resume-main-body").on('click','#step-2',function() {
        event.preventDefault(); 
        var jobid = $(this).data('jobid');
        
        if(jobid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'postajob-form.php',
                        data:"jobid=" + jobid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #p2').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                            $('#postajob-form').parsley({
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
        }
        return false;
    });
    
    $("#resume-main-body").on('click','#step-3',function() {
        event.preventDefault(); 
        var jobid = $(this).data('jobid');
        if(jobid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'jobskills-form.php',
                        data:"jobid=" + jobid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #p2').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                            var options = {
                                url: "json/skilltags.json",
                                getValue: "name",
                                list: {
                                    match: {
                                        enabled: true
                                           }
                                       }
                            }
                            $("#jobskill").easyAutocomplete(options);
                            $('#jobskills-form').parsley({
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
        }
        return false;
    });
    
    $("#resume-main-body").on('click','#step-4',function() {
        event.preventDefault(); 
        var jobid = $(this).data('jobid');
         if(jobid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'previewjobad.php',
                        data:"jobid=" + jobid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #p2').addClass('active');
                            
                            
                        }
            });
         }
        return false;
    });
    
    $("#resume-main-body").on('click','#previewjobad',function() {
        event.preventDefault(); 
        var jobid = $(this).data('jobid');
        if(jobid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'previewjobad.php',
                        data:"jobid=" + jobid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #p2').addClass('active');
                            
                        }
            });
        }
        return false;
    });
    
    
    $(document).on('submit','#templates-form',function(event){
             
            event.preventDefault();      
      
            var template = $("#templates-form #template").val();
            var mode = $("#templates-form #mode").val();
            if(template > 0){
                mode = 'update';
            }
            var userid = $("#templates-form #userid").val();
          
            $.ajax({
                cache: false,
                type: "POST",              
                url: "templates-submit.php",
                data: "mode=" +mode + "&template=" + template + "&userid=" + userid,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                success : function(data){                 
                    $('#resume-main-body').html(data).fadeIn(1500);
                    $('#resume-main-body #startappdate').datepicker();
                    $('#resume-main-body #endappdate').datepicker();
                    $('#resume-main-body #jobdesc').summernote({
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
                    $(function() {
                         $.material.init();
                    });
                    $('#templates-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                            classHandler: function (el) {
                                return el.$element.closest(".form-group");
                            },
                            errorsContainer: function (el) {
                                return el.$element.closest(".form-group");
                            },
                     });
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    
    $(document).on('submit','#templatejobdetail-form',function(event){
             
            event.preventDefault();      
      
            var templateid = $("#templatejobdetail-form #templateid").val();
            var jobtitle = $("#templatejobdetail-form #jobtitle").val();
            var mode = $("#templatejobdetail-form #mode").val();
            var userid = $("#templatejobdetail-form #userid").val();
            var specialization = $("#templatejobdetail-form #specialization").val();
            var plevel = $("#templatejobdetail-form #plevel").val();
            var jobtype = $("#templatejobdetail-form #jobtype").val();
            var msalary = $("#templatejobdetail-form #msalary").val();
            var maxsalary = $("#templatejobdetail-form #maxsalary").val();
            var startappdate = $("#templatejobdetail-form #startappdate").val();
            var endappdate = $("#templatejobdetail-form #endappdate").val();
            var nvacancies = $("#templatejobdetail-form #nvacancies").val();
            var jobdesc = $("#templatejobdetail-form #jobdesc").summernote('code');
            var city = $("#templatejobdetail-form #city").val();
            var province = $("#templatejobdetail-form #province").val();
            var country = $("#templatejobdetail-form #country").val();
            var yrsexp = $("#templatejobdetail-form #yrsexp").val();
            var mineduc = $("#templatejobdetail-form #mineduc").val();
            var prefcourse = $("#templatejobdetail-form #prefcourse").val();
            var languages = $("#templatejobdetail-form #languages").val();
            var licenses = $("#templatejobdetail-form #licenses").val();           
            var wtravel = 'off';
            if($("#templatejobdetail-form #wtravel").prop('checked')==true){
               wtravel = 'on';
            }            
            var wrelocate = 'off';
            if($("#templatejobdetail-form #wrelocate").prop('checked')==true){
               wrelocate = 'on';
            }
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "templatejobdetail-submit.php",
                data: "templateid=" + templateid + "&mode=" +mode + "&userid=" + userid + "&jobtitle=" + jobtitle + "&specialization=" + specialization +"&plevel=" + plevel + "&jobtype=" + jobtype + "&msalary=" + msalary + "&maxsalary=" + maxsalary + "&startappdate=" + startappdate + "&endappdate=" + endappdate + "&nvacancies=" + nvacancies + "&jobdesc=" + jobdesc + "&city=" + city + "&province=" + province + "&country=" + country + "&yrsexp=" + yrsexp + "&mineduc=" + mineduc + "&prefcourse=" + prefcourse + "&languages=" + languages + "&licenses=" + licenses + "&wtravel=" + wtravel + "&wrelocate=" + wrelocate,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                success : function(data){                 
                    $('#resume-main-body').html(data).fadeIn(1500); 
                    $('#resume-main-body #successdivjobskillstag').hide();
                    $(function() {
                         $.material.init();
                    });
                    $('#jobskillstemplate-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                                classHandler: function (el) {
                                    return el.$element.closest(".form-group");
                                },
                                errorsContainer: function (el) {
                                    return el.$element.closest(".form-group");
                                },
                     });
                     var options = {
                        url: "json/skilltags.json",
                        getValue: "name",
                        list: {
                            match: {
                                enabled: true
                                   }
                               }
                    }
                    $("#jobskill").easyAutocomplete(options);
                },
                error: function(data) {
                    console.log(data); 
                }
            });
            return false;
    });
    
    $(document).on('submit','#jobskillstemplate-form',function(event){
             
            event.preventDefault();      
            $('#resume-main-body #successdivjobskillstag').hide();
            var templateid = $("#jobskillstemplate-form #templateid").val();           
            var mode = $("#jobskillstemplate-form #mode").val();
            var userid = $("#jobskillstemplate-form #userid").val();          
            var jobskill = $("#jobskillstemplate-form #jobskill").val();         
            var trimmed = $("#jobskillstemplate-form #jobskill").val();
            trimmed = trimmed.replace(/\s+/g, '');          
            var jobskilltag = '#' + trimmed;
        
            $.ajax({
                cache: false,
                type: "POST",              
                url: "templatejobskills-submit.php",
                data: "mode=" +mode + "&userid=" + userid + "&templateid=" + templateid +"&jobskill=" + jobskill + "&jobskilltag=" + jobskilltag,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                    console.log(data);
                    $('.features #jobskilltagsdiv').html(data).fadeIn(1500);
                    $('.features #successdivjobskillstag').fadeIn(1500);  
                                
                    $(' #jobskillstemplate-form #mode').val('insert');
                    $(function() {
                             $.material.init();
                    });
                    $('#templatejobdetail-form').parsley({
                                successClass: "has-success",
                                errorClass: "has-error",
                                classHandler: function (el) {
                                    return el.$element.closest(".form-group");
                                },
                                errorsContainer: function (el) {
                                    return el.$element.closest(".form-group");
                                },
                    });
                },
                error: function(data) {
                    console.log(data);                  
                   
                }
            });
            return false;
    });
    
    $("#resume-main-body").on('click','#previewjobtemplate',function() {
        event.preventDefault(); 
        var templateid = $(this).data('templateid');
        if(templateid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'templatepreview.php',
                        data:"templateid=" + templateid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #j3').addClass('active');
                                                      
                        }
            });
        }
        return false;
    });
    
    $("#resume-main-body").on('click','#step-2-template',function() {
        event.preventDefault(); 
        var templateid = $(this).data('templateid');
        
        if(templateid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'templatejobdetail-form.php',
                        data:"templateid=" + templateid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #j3').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                            $('#templatejobdetail-form').parsley({
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
        }      
        return false;
    });
    
    $("#resume-main-body").on('click','#step-3-template',function() {
        event.preventDefault(); 
        var templateid = $(this).data('templateid');
        if(templateid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'templatejobskills-form.php',
                        data:"templateid=" + templateid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #j3').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                            $('#jobskillstemplate-form').parsley({
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
        }
        return false;
    });
    
    $("#resume-main-body").on('click','#step-4-template',function() {
        event.preventDefault(); 
        var templateid = $(this).data('templateid');
        if(templateid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'templatepreview.php',
                        data:"templateid=" + templateid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #j3').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                            
                        }
            });
        }
        return false;
    });


});  