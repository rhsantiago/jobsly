$(document).ready(function ($) {
    
    $("a[href='#jobadsappr'], a[href='admin-approvals.php?ajax=jobadsappr']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-jobadsapproval.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);    
                            $(function() {
                                $.material.init();
                            });             
                }
        });
        return false;
    });
    
    $("a[href='#empappr'], a[href='admin-approvals.php?ajax=empappr']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-employersapproval.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
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
    
    $('#admin-showjemployer-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);
        // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
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
    
    
    
    
    
});   
    