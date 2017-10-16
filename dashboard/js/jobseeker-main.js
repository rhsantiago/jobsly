jQuery(document).ready(function ($) {
    
     $("a[href='#aapp']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide(); 
        $.ajax({
            url: 'jobseeker-activeapp.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #a1').addClass('active');
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                    ChangeUrl('Job Applications | jobsly', 'jobseeker-activeapp.php');
                    $('title').html('Job Applications | jobsly');
                     
                }
               
        });
        return false;
     });
    
    $("a[href='#jinv']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'jobseeker-invites.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },    
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);    
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                    ChangeUrl('Job Invitations | jobsly', 'jobseeker-invites.php');
                    $('title').html('Job Invitations | jobsly');
                }
               
        });
        return false;
     });
    
    $("a[href='#sapp']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'jobseeker-savedapp.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },    
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #s3').addClass('active');
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                    ChangeUrl('Saved Applications | jobsly', 'jobseeker-savedapp.php');
                    $('title').html('Saved Applications | jobsly');
                     
                }
               
        });
        return false;
     });
    
    $("a[href='#ljob']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'jobseeker-latestjobs.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #l4').addClass('active');
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
     });
   
     $(window).scroll(function() {
              
     // if ($(window).scrollTop() == $(document).height() - $(window).height()) {
         if (($(document).height() - $(window).height() - $(window).scrollTop()) < 0.5 ) {
            $('#loadmorejobs-form').submit();
            
      }
    });
   
     $(document).on('submit','#loadmorejobs-form',function(event){
             
            event.preventDefault();
            $('#loader').hide();
            var next = $("#loadmorejobs-form #next").val();
            var inext = $("#loadmorejobs-form #inext").val();
            var search = $("#loadmorejobs-form #search").val();
            var esalary = $("#loadmorejobs-form #esalary").val();
            var specialization = $("#loadmorejobs-form #specialization").val();
            
            $.ajax({
                    type: "POST",
                    url: 'loadmorejobs.php',
                    data: "next=" +next+ "&search=" +search+ "&esalary=" +esalary+ "&specialization=" +specialization+"&inext="+inext,
                    dataType: 'html',
                    beforeSend: function() {
                     $('#loader').show();
                          },
                     complete: function(){
                          $('#loader').hide();
                    },
                    success: function (html) {
                        console.log(specialization);
                        $(".loadmoreform").remove();
                        $('.loadmore').append(html);
                        $('[data-toggle="tooltip"]').tooltip();
                        ChangeUrl('Latest Jobs | jobsly', 'jobseeker-latestjobs.php?next='+next);
                    }
           });
    }); 
     
    $('#showjob-modal').on('show.bs.modal', function(e) {
               $('#loader').hide(); 
               var $modal = $(this);
              // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
               
               var jobid =  $(e.relatedTarget).data('jobid');
               var mode =  $(e.relatedTarget).data('mode');
               var isjobseeker =  $(e.relatedTarget).data('isjobseeker');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'showjob-modal.php',
            data: 'jobid=' + jobid + "&mode=" + mode + "&isjobseeker=" + isjobseeker,
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },      
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#successdivquickapply').hide();
                $modal.find('#warningdivquickapply').hide();
               // $('#quickapplydiv #successdivquickapply').hide();
                $(function() {
                           $.material.init();
                });
                $('#quickapply-form-modal').parsley({
                       successClass: "has-success",
                       errorClass: "has-error"
                });
                   
            }
        });
    });
    
    $(document).on('submit','#quickapply-form-modal',function(event){
            event.preventDefault();
            $('#loader').hide();
            $('#successdivquickapply').hide();
            $('#warningdivquickapply').hide();
            var esalary = $("#quickapply-form-modal #esalary").val();
            var jobid = $("#quickapply-form-modal #jobid").val();
            var userid = $("#quickapply-form-modal #userid").val();
            var essay = $("#quickapply-form-modal #essay").val();
        
        
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "quickapply-submit.php",
                data: "jobid=" + jobid + "&userid=" + userid + "&esalary=" + esalary + "&essay=" + essay,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'html',
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success : function(data){
                    console.log(data);
                    if(data=='applied'){
                        $('#warningdivquickapply').fadeIn(1500);                       
                    }else{
                        $('#successdivquickapply').fadeIn(1500);
                        $('#section'+jobid).remove();
                    }
                                
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    $('#savejob').on('click',function() {  
        $('#savejob-modal').modal('show');
     });
    
   $('#savejob-modal').on('show.bs.modal', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#loader').hide();
        var $modal = $(this);
        var jobid =  $(e.relatedTarget).data('jobid');
        var userid =  $(e.relatedTarget).data('userid');
        
        $.ajax({
            type: "POST",
             data: "jobid=" + jobid + "&userid=" + userid,
            url: 'savedapplications-submit.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
            success: function (html) {
                     $modal.find('.modalcontent').html(html);
                    $("#savejob"+jobid).addClass("text-success");
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
   
     });
    
    
     $(document).on('click','#removesaved',function(e) {
            e.preventDefault();           
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'jobseeker-removesaved.php',
                data: 'jobid=' + jobid,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                     $('#section'+ jobid).delay(700).fadeOut(300, function(){
                        $(this).remove();
                     });
                   // $("#section" + jobid).remove().delay(1000);
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    $(document).on('click','#removeinvite',function(e) {
            e.preventDefault();           
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'jobseeker-removeinvite.php',
                data: 'jobid=' + jobid,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                     $('#section'+ jobid).delay(700).fadeOut(300, function(){
                        $(this).remove();
                     });
                   // $("#section" + jobid).remove().delay(1000);
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    /*
     $(document).on('submit','#search-form',function(event){
        e.preventDefault();
          $.post( 'jobseeker-latestjobs.php', $('#search-form').serialize(), function( data ) {
               alert( data ); 
          } );
     });     
   
    $(document).on('submit','#search-form',function(event){
             event.preventDefault()
             event.stopPropagation();                  
             var search = $("#search-form #search").val();
             var esalary = $("#search-form #esalary").val();
             var specialization = $("#search-form #specialization").val();
            
            $.ajax({
                    type: "POST",
                    url: 'jobseeker-latestjobs.php',
                    data: "search=" +search+ "&esalary=" +esalary+ "&specialization=" +specialization,
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
    */
   /* 
    $('#viewjobnewpage').on('click', function (){  

        var jobid = $(this).data('jobid');
        var mode = $(this).data('mode');
        var isjobseeker = $(this).data('isjobseeker');
        if (jobid != undefined && jobid != null) {
            window.location = 'viewjob-newpage.php?jobid=' + jobid + '&mode=' + mode + '&isjobseeker=' + isjobseeker;
        }
    });
    */
    
    
});   