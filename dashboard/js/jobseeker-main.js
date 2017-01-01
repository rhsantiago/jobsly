jQuery(document).ready(function ($) {
    
     $("a[href='#aapp']").on('click', function (){  
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
    
    $("a[href='#ljobs']").on('click', function (){  
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
                        //$('#loading').hide();
                    }
           });
    }); 
    
    $('#showjob-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);
              // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
               
               var jobid =  $(e.relatedTarget).data('jobid');               
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'showjob-modal.php',
            data: 'jobid=' + jobid,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#successdivquickapply').hide();
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
                dataType: 'text',
                success : function(data){                    
                    $('#successdivquickapply').fadeIn(1500);
                                
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    });
    
    
    
});   