jQuery(document).ready(function ($) {
    
     $("a[href='#aapp']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'jobseeker-activeapp.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #a1').addClass('active');
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
     });
    
    $("a[href='#sapp']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'jobseeker-savedapp.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #s3').addClass('active');
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
     });
    
    $("a[href='#ljob']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'jobseeker-latestjobs.php',
            dataType: 'html',

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
      if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            $('#loadmorejobs-form').submit();
            
      }
    });
    
     $(document).on('submit','#loadmorejobs-form',function(event){
             
            event.preventDefault();                  
            var next = $("#loadmorejobs-form #next").val();
            
            $.ajax({
                    type: "POST",
                    url: 'loadmorejobs.php',
                    data: "next=" +next,
                    dataType: 'html',

                    success: function (html) {
                       // console.log(html);
                        $(".loadmoreform").remove();
                        $('.loadmore').append(html);
                        $('[data-toggle="tooltip"]').tooltip();
                        //$('#loading').hide();
                    }
           });
    }); 
    
    $('#showjob-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);
              // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
               
               var jobid =  $(e.relatedTarget).data('jobid');
               var mode =  $(e.relatedTarget).data('mode');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'showjob-modal.php',
            data: 'jobid=' + jobid + "&mode=" + mode,
                  
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
                success : function(data){
                    console.log(data);
                    if(data=='applied'){
                        $('#warningdivquickapply').fadeIn(1500);
                    }else{
                        $('#successdivquickapply').fadeIn(1500);
                    }
                                
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
   $('#savejob-modal').on('show.bs.modal', function(e) {
        event.preventDefault();
        event.stopPropagation();
        var $modal = $(this);
        var jobid =  $(e.relatedTarget).data('jobid');
        var userid =  $(e.relatedTarget).data('userid');
        
        $.ajax({
            type: "POST",
             data: "jobid=" + jobid + "&userid=" + userid,
            url: 'savedapplications-submit.php',
            dataType: 'html',

            success: function (html) {
                     $modal.find('.modalcontent').html(html);
                   
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #s3').addClass('active');
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
   
     });
    
    
    
});   