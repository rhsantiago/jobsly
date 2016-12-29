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
                        console.log(html);
                        $(".loadmoreform").remove();
                        $('.loadmore').append(html);
                        //$('#loading').hide();
                    }
           });
    });     
    
    
    
    
    
    
    
    
    
    
    
    
    
});   