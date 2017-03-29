$(document).ready(function ($) {
    
    $("a[href='#emplist'], a[href='admin-employers.php?ajax=emplist']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-employerslist.php',
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
    
    $("a[href='#empjobads'], a[href='admin-employers.php?ajax=empjobads']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-employerjobads.php',
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
    
    $('#approvejobad').on('click',function() {  
        $('#approvejobad-form').submit();
     });
    
    $(document).on('submit','#approvejobad-form',function(event) {
            event.preventDefault();
            var jobid = $("#approvejobad-form #jobid").val();
            var mode = $("#approvejobad-form #mode").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'admin-approvejobadsubmit.php',
                data: 'jobid=' + jobid + '&mode=' + mode,         
                success: function(data) {                           
                     $('#adapproveddiv').fadeIn(1500); 
                     $("#section" + jobid).remove();
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    $('#admin-showemployer-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);   
               var employerid =  $(e.relatedTarget).data('employerid');
               var mode =  $(e.relatedTarget).data('mode');         
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-showemployermodal.php',
            data: 'employerid=' + employerid + "&mode=" + mode,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#employerapproveddiv').hide();             
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    $(document).on('submit','#approveemployer-form',function(event) {
            event.preventDefault();
            var employerid = $("#approveemployer-form #employerid").val();
            var mode = $("#approveemployer-form #mode").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'admin-approveemployersubmit.php',
                data: 'employerid=' + employerid + '&mode=' + mode,         
                success: function(data) {                           
                     $('#employerapproveddiv').fadeIn(1500); 
                     $("#line" + employerid).remove();
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    $(document).on('submit','#employeractivation-form',function(event) {
            event.preventDefault();
            var employerid = $("#employeractivation-form #employerid").val();
            var action = $("#employeractivation-form #action").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'admin-employeractivation-submit.php',
                data: 'employerid=' + employerid + '&action=' + action,         
                success: function(data) {     
                     if(action=='deactivate'){
                        $('#employeractivation-form #activatebtn').html('Activate'); 
                        $("#employeractivation-form #action").val('activate');
                        $("#activelabel").removeClass('text-success').addClass('text-danger').html('This Employer is INACTIVE'); 
                     }else if(action=='activate'){
                        $('#employeractivation-form #activatebtn').html('Deactivate'); 
                        $("#employeractivation-form #action").val('deactivate'); 
                        $("#activelabel").removeClass('text-danger').addClass('text-success').html('This Employer is ACTIVE');                       
                     }
              
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
     $(document).on('submit','#employersearch-form',function(event){
             event.preventDefault()
             event.stopPropagation();                  
             var search = $("#employersearch-form #search").val();
            $.ajax({
                    type: "POST",
                    url: 'admin-employerslist.php',
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
    
    $(document).on('click','#employersloadmore',function(event) {
            
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-employerslistloadmore.php',
            data: '',
                  
            success: function(html) {
                $('#activeappstable').append(html).fadeIn('slow').delay(1000);
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    
    
});   
    