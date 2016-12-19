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
                                    ]
                          });
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
                                    ]
                    });
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
    
    $(document).on('submit','#postajob-form',function(event){
             
            event.preventDefault();      
      
            var jobid = $("#postajob-form #jobid").val();
            var jobtitle = $("#postajob-form #jobtitle").val();
            var mode = $("#postajob-form #mode").val();
            var userid = $("#postajob-form #userid").val();
            var specialization = $("#postajob-form #specialization").val();
            var plevel = $("#postajob-form #plevel").val();
            var jobtype = $("#postajob-form #jobtype").val();
            var msalary = $("#postajob-form #msalary").val();
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
            var wtravel = $("#postajob-form #wtravel").val();
            var wrelocate = $("#postajob-form #wrelocate").val();           
                  
            $.ajax({
                cache: false,
                type: "POST",              
                url: "postajob-submit.php",
                data: "jobid=" + jobid + "&mode=" +mode + "&userid=" + userid + "&jobtitle=" + jobtitle + "&specialization=" + specialization +"&plevel=" + plevel + "&jobtype=" + jobtype + "&msalary=" + msalary + "&startappdate=" + startappdate + "&endappdate=" + endappdate + "&nvacancies=" + nvacancies + "&jobdesc=" + jobdesc + "&city=" + city + "&province=" + province + "&country=" + country + "&yrsexp=" + yrsexp + "&mineduc=" + mineduc + "&prefcourse=" + prefcourse + "&languages=" + languages + "&licenses=" + licenses + "&wtravel=" + wtravel + "&wrelocate=" + wrelocate,
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
                        }
            });
      
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
                            $('#jobskills-form').parsley({
                                successClass: "has-success",
                                errorClass: "has-error"
                            });
                        }
            });
        }
        return false;
    });


});  