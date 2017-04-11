$(document).ready(function ($) {
    
    $('#admin-viewresumemodal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);   
               var applicantid =  $(e.relatedTarget).data('applicantid');
               var mode =  $(e.relatedTarget).data('mode');         
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-viewresumemodal.php',
            data: 'applicantid=' + applicantid + "&mode=" + mode,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#employerapproveddiv').hide();             
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
  
    $(document).on('submit','#jobseekersearch-form',function(event){
             event.preventDefault()
             event.stopPropagation();                  
             var search = $("#jobseekersearch-form #search").val();
            $.ajax({
                    type: "POST",
                    url: 'admin-jobseekerslist.php',
                    data: "search=" + search,
                    dataType: 'html',
                    success: function (html) {   
                         $('#resume-main-body').html(html);
                         $('[data-toggle="tooltip"]').tooltip();
                         $(function() {
                                $.material.init();
                            });
                    }
           });
        return false;
    });
    
    $(document).on('click','#activatebtn',function(event) {
            var applicantid =  $(this).data('applicantid');
            var action =  $(this).data('action');          
            $('#jobseekeractivation-form #applicantid').val(applicantid);
            $('#jobseekeractivation-form #action').val(action);        
            $('#jobseekeractivation-form').submit();
    });  
    
    $(document).on('submit','#jobseekeractivation-form',function(event) {
            event.preventDefault();
            var applicantid = $("#jobseekeractivation-form #applicantid").val();
            var action = $("#jobseekeractivation-form #action").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'admin-jobseekeractivation-submit.php',
                data: 'applicantid=' + applicantid + '&action=' + action,         
                success: function(data) {
                     var btn = '#btnline' + applicantid;
                     var status = '#statusline' + applicantid;
                     if(action=='deactivate'){
                        $(btn).html("<button class='btn btn-primary btn-xs' name='activatebtn' id='activatebtn' type='submit' data-applicantid='"+applicantid+"' data-action='activate'>Activate</button>"); 
                        $(status).html("<span class='text-danger h4weight'>Inactive</span>"); 
                        
                       // $("#activelabel").removeClass('text-success').addClass('text-danger').html('This Job ad is INACTIVE'); 
                     }else if(action=='activate'){
                        $(btn).html("<button class='btn btn-primary btn-xs' name='activatebtn' id='activatebtn' type='submit' data-applicantid='"+applicantid+"' data-action='deactivate'>Deactivate</button"); 
                        $(status).html("<span class='text-success h4weight'>Active</span>");
                       // $("#activelabel").removeClass('text-danger').addClass('text-success').html('This Job ad is ACTIVE');                       
                     }
              
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    /*
    $(document).on('click','#jobseekersloadmore',function(event) {
            $('#jobseekersloadmore-form').submit();
    });
    */
    $(document).on('click','#jobseekersloadmore',function(event) {
           // var next = $("#jobseekersloadmore-form #next").val();
             var next =  $(this).data('next');
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-loadmorejobseekers.php',
            data: 'next=' + next,
            dataType: 'html',
            success: function(html) {
                next = next + 10;
                $("#jobseekersloadmore").data("next", next);
                $("#jobseekersloadmore").attr("data-next", $("#jobseekersloadmore").data("next"));
              //  $(".loadmoreform").remove();
              //  $(".loadmore").html("<div class='loadmoreform'><form method='post' id='jobseekersloadmore-form' name='jobseekersloadmore-form'><input type='hidden' id='next' name='next' value='"+next+"'></form></div>");
                $('#jobseekerstablebody').append(html).fadeIn('slow').delay(1000);
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });

    
    
});   