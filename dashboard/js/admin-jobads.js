$(document).ready(function ($) {
    
    $("a[href='#alist'], a[href='admin-jobads.php?ajax=alist']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-activejobadslist.php',
            dataType: 'html',

            success: function (html) {
                    $('[data-toggle="tooltip"]').tooltip();
                    $('#resume-main-body').html(html);    
                            $(function() {
                                $.material.init();
                            });             
                }
        });
        return false;
    });
    
    $("a[href='#ilist'], a[href='admin-jobads.php?ajax=ilist']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-inactivejobadslist.php',
            dataType: 'html',

            success: function (html) {
                    $('[data-toggle="tooltip"]').tooltip();
                    $('#resume-main-body').html(html);    
                            $(function() {
                                $.material.init();
                            });             
                }
        });
        return false;
    });
    $("a[href='#jdtls'], a[href='admin-jobads.php?ajax=jdtls']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-jobadpage.php',
            dataType: 'html',

            success: function (html) {
                    $('[data-toggle="tooltip"]').tooltip();
                    $('#resume-main-body').html(html);    
                            $(function() {
                                $.material.init();
                            });             
                }
        });
        return false;
    });
    
    $(document).on('submit','#jobactivation-form',function(event) {
            event.preventDefault();
            var jobid = $("#jobactivation-form #jobid").val();
            var action = $("#jobactivation-form #action").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'admin-jobactivation-submit.php',
                data: 'jobid=' + jobid + '&action=' + action,         
                success: function(data) {     
                     if(action=='deactivate'){
                        $('#jobactivation-form #activatebtn').html('Activate'); 
                        $("#jobactivation-form #action").val('activate');
                        $("#activelabel").removeClass('text-success').addClass('text-danger').html('This Job ad is INACTIVE'); 
                     }else if(action=='activate'){
                        $('#jobactivation-form #activatebtn').html('Deactivate'); 
                        $("#jobactivation-form #action").val('deactivate'); 
                        $("#activelabel").removeClass('text-danger').addClass('text-success').html('This Job ad is ACTIVE');                       
                     }
              
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    
    /*
     $('#admin-showjob-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);
              // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
               
               var jobid =  $(e.relatedTarget).data('jobid');
               var mode =  $(e.relatedTarget).data('mode');         
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-showjobmodal.php',
            data: 'jobid=' + jobid + "&mode=" + mode,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#adapproveddiv').hide();             
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
   */
       
     $(document).on('submit','#jobadssearch-form',function(event){
             event.preventDefault()
             event.stopPropagation();                  
             var search = $("#jobadssearch-form #search").val();
            $.ajax({
                    type: "POST",
                    url: 'admin-activejobadslist.php',
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
    
    $(document).on('click','#activejobadsloadmore',function(event) {
            
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-activejobadslistloadmore.php',
            data: '',
                  
            success: function(html) {
                $('#activeappstable').append(html).fadeIn('slow').delay(1000);
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    $('#admin-showresume-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);      
               var applicantid =  $(e.relatedTarget).data('applicantid');
               var jobid =  $(e.relatedTarget).data('jobid');    
               var mode =  $(e.relatedTarget).data('mode');         
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-viewresumemodal.php',
            data: 'jobid=' + jobid + "&applicantid=" + applicantid + "&mode=" + mode,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#adapproveddiv').hide();             
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
     $(document).on('click','#aappsloadmore',function(event){
         $('#admin-loadmoreaappsform').submit();
      });     
    
    $(document).on('submit','#admin-loadmoreaappsform',function(event){
             
            event.preventDefault();                  
            var next = $("#admin-loadmoreaappsform #next").val();
            var jobid = $("#admin-loadmoreaappsform #jobid").val();
            
            $.ajax({
                    type: "POST",
                    url: 'admin-loadmoreaapps.php',
                    data: "next=" +next+ "&jobid=" +jobid,
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $(".loadmoreform").remove();
                        $('#activeappstable').append(html).fadeIn('slow').delay(1000);
                        $('[data-toggle="tooltip"]').tooltip();
                        //$('#loading').hide();
                    }
           });
    });
    
    
    
});   
    