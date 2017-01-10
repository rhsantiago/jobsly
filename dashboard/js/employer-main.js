jQuery(document).ready(function ($) {
    
    $("a[href='#ajposts']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
 
        $.ajax({
            url: 'employer-activejobposts.php',
            dataType: 'html',
            success: function (html) {
                    // console.log(html);
                    $('#resume-main-body').html(html);
                $('#successdivdeljob').hide();
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
     });
    
    $("a[href='#napp']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
 
        $.ajax({
            url: 'employer-newapps.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);               
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                    });
                     
                }
               
        });
        return false;
     });
    
    
    $("#resume-main-body").on('click','#editjob',function(event) {
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
    
     $('#applicantview').on('click', function(event){  
             $('#viewresume-form').submit();
     });
    
     $('#viewresume-form').on('submit', function(event){  
         
     });     
    
     $('#viewresume-modal').on('show.bs.modal', function(e) {
              
              var $modal = $(this);
             //  $modal.find('#modaleditessay #successdivessaymodal').hide();        
              var mode =  $(e.relatedTarget).data('mode');
              var applicantid =  $(e.relatedTarget).data('applicantid');
              var userid = $(e.relatedTarget).data('userid');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'viewresume-modal.php',
            data: 'applicantid=' + applicantid +
                  '&userid=' + userid +
                  '&mode=' + mode,
            success: function(data) {
                $modal.find('.modalcontent').html(data);     
                $(function() {
                           $.material.init();
                    });
               
            }
        });
    });
    
    $("#resume-main-body").on('click','#jobdetails',function(event) {
            event.preventDefault();           
            var jobid =  $(this).data('jobid');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-jobdetails.php',
                data: 'jobid=' + jobid,
                success: function(html) {
                   // console.log(html);
                    $('#resume-main-body').html(html);   
                    $(function() {
                               $.material.init();
                    });

                }
            });
      //  return false;
     });
    
    $("#resume-main-body").on('click','#newapps',function(event) {
            event.preventDefault();           
            var jobid =  $(this).data('jobid');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-loadjobdetails.php',
                data: 'jobid=' + jobid,
                success: function(html) {
                    //console.log(html);
                    $('#showjobdetail').html(html); 
                    $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });

                }
            });
      //  return false;
     });
    
    
});       