/* hide panel body
$(function() {
    $('.panel-image img.panel-image-preview').on('click', function(e) {
	    $(this).closest('.panel-image').toggleClass('hide-panel-body');
    });
});
*/



$(document).ready(function($) {
    //$('#jobseekerform').hide();
   /// $('#employerform').hide();    
   // $('#signupform').html($('#jobseekerform').html());
   // $('#signupform').slideDown(1000);
     $("#signup-form").parsley();
    
    $("#signup-form").parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsContainer: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsWrapper: "<span class='help-block'></span>",
        errorTemplate: "<span></span>"
    });
    
    $(window).scroll(function() {
      if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            $.ajax({
                    url: 'loadmorejobs.php',
                    dataType: 'html',

                    success: function (html) {
                        console.log(html);
                        $('.loadmore').append(html);
                        //$('#loading').hide();
                    }
                });

      }
    });
    
    $('.card__share > a').on('click', function(e){ 
        e.preventDefault() // prevent default action - hash doesn't appear in url
        $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
        $(this).toggleClass('share-expanded');
    });
    
    
    $('#signupform #signup-form').on('submit',function(event){
             
            event.preventDefault();
            var password = $("#signupform #password").val();
            var email = $("#signupform #email").val();       
            var usertype = $("#signupform #usertype").val();
            var companyname = $("#signupform #companyname").val();
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "register-submit.php",
                data: "password=" + password + "&email=" + email + "&usertype=" + usertype + "&companyname=" + companyname,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                   if(data=='emailtaken')
                   {
                        $( "#signupform #email-group" ).addClass('has-error');           
                   }else{
                        $( "#signupform" ).html(data);
                        $( ".signup-welcome" ).hide();
                        if($(window).width()>750){                            
                            $('#signupform').animate({opacity: 1.0, right: '250px'}, 1000);
                        }
                   }
                    // $( "#signupform .input-group" ).addClass('has-error');
                
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            return false;
    }); 
    
    $('#employerbutton').click(function() {  
        
        // replace the contents of the div with the link text
       // $('#signupform #jobseekerform').hide();
       
        $('#signupform #employerform').show();
        $('#signupform').html($('#employerform').html());  
        $('#signupform').hide().fadeIn('slow','linear');
             
    // cancel the default action of the link by returning false
        return false;
    });

        $('#jobseekerbutton').click(function() {     

            // replace the contents of the div with the link text
       //      $('#signupform #employerform').hide();

            $('#signupform #jobseekerform').show();
            $('#signupform').html($('#jobseekerform').html());
            $('#signupform').hide().fadeIn('slow','linear');


           // $('#signupform').slideDown(1000);    


            // cancel the default action of the link by returning false
            return false;
        });
    
    
    $('.quickviewdiv').hover(function(){
        $(this).css("background-color", "#589fff");
         $(this).css("box-shadow", "3px 3px 3px #000");
        }, function(){
        $(this).css("background-color", "#e7e7e7");
         $(this).css("box-shadow", "none");
    });
    
    
  
});

$('#job-modal').on('show.bs.modal', function(e) {

        var $modal = $(this),
              jobid = e.relatedTarget.id,
              title = e.relatedTarget.title;
            // jobid= $(this).data('jobid');
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'modal.php',
            data: 'jobid=' + jobid +
                  '&title=' + title,
            success: function(data) {
                $modal.find('.modalcontent').html(data);
            }
        });
    });








