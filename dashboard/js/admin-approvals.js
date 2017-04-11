$(document).ready(function ($) {
    
    $("a[href='#jobadsappr'], a[href='admin-approvals.php?ajax=jobadsappr']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-jobadsapproval.php',
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
    
    $("a[href='#empappr'], a[href='admin-approvals.php?ajax=empappr']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-employersapproval.php',
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
    
    $("a[href='#jseekerappr'], a[href='admin-approvals.php?ajax=jseekerappr']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'admin-jobseekerapproval.php',
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
    
    $(document).on('submit','#jobadssearch-form',function(event){
             event.preventDefault()
             event.stopPropagation();                  
             var search = $("#jobadssearch-form #search").val();
            $.ajax({
                    type: "POST",
                    url: 'admin-jobadsapproval.php',
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
    
    $(document).on('click','#empapprloadmore',function(event) {
           // var next = $("#jobseekersloadmore-form #next").val();
             var next =  $(this).data('next');
            var search =  $(this).data('search');
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-empapprloadmore.php',
            data: 'next=' + next + '&search=' + search,
            dataType: 'text',
            success: function(html) {              
                if(html=='end'){
                   $('#resume-main-body #endofsearch').hide();    
                   $('#resume-main-body #endofsearch').fadeIn(1500);
                }else{
                next = next + 10;
                $("#empapprloadmore").data("next", next);
                $("#empapprloadmore").attr("data-next", $("#empapprloadmore").data("next"));
              //  $(".loadmoreform").remove();
              //  $(".loadmore").html("<div class='loadmoreform'><form method='post' id='jobseekersloadmore-form' name='jobseekersloadmore-form'><input type='hidden' id='next' name='next' value='"+next+"'></form></div>");
                $('#empapprtablebody').append(html).fadeIn('slow').delay(1000);
                }
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    $(document).on('click','#jobseekerapprloadmore',function(event) {
           // var next = $("#jobseekersloadmore-form #next").val();
             var next =  $(this).data('next');
            var search =  $(this).data('search');
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-jobseekerapprloadmore.php',
            data: 'next=' + next + '&search=' + search,
            dataType: 'text',
            success: function(html) {              
                if(html=='end'){
                   $('#resume-main-body #endofsearch').hide();    
                   $('#resume-main-body #endofsearch').fadeIn(1500);
                }else{
                next = next + 10;
                $("#jobseekerapprloadmore").data("next", next);
                $("#jobseekerapprloadmore").attr("data-next", $("#jobseekerapprloadmore").data("next"));
              //  $(".loadmoreform").remove();
              //  $(".loadmore").html("<div class='loadmoreform'><form method='post' id='jobseekersloadmore-form' name='jobseekersloadmore-form'><input type='hidden' id='next' name='next' value='"+next+"'></form></div>");
                $('#jobseekerapprtablebody').append(html).fadeIn('slow').delay(1000);
                }
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    
    
});   
    