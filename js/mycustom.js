/* hide panel body
$(function() {
    $('.panel-image img.panel-image-preview').on('click', function(e) {
	    $(this).closest('.panel-image').toggleClass('hide-panel-body');
    });
});
*/



$(document).ready(function($) {
    $('#employerform').hide();
    $('#jobseekerform').hide();    
    $('#signupform').html($('#jobseekerform').html());
    $('#signupform').slideDown(1000);
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
    
    
    $('#signupform #signup-form').submit(function(event){
        // cancels the form submission
      
        
            var password = $("#signupform #password").val();
            var email = $("#signupform #email").val();       
            var usertype = $("#signupform #usertype").val();
           // var formdata = {password:password,email:email,usertype:usertype};
            $.ajax({
                cache: false,
                type: "POST",              
                url: "register-submit.php",
                data: "password=" + password + "&email=" + email + "&usertype=" + usertype,
               // data: {password:password,email:email,usertype:usertype},
                dataType: 'text',
                success : function(data){
                   
                  $( "#signupform" ).html(data);
                    // $( "#signupform .input-group" ).addClass('has-error');
                
                },
                error: function(data) {
                     $( "#msgSubmit" ).removeClass('hidden');
                }
            });
            event.preventDefault();
    }); 
    
    $('#employerbutton').click(function() {   
        // replace the contents of the div with the link text  
        $('#signupform #jobseekerform').remove();
       $('#signupform').html($('#employerform').html());    
       $('#signupform').hide().fadeIn('slow','linear');      
  
  
    // cancel the default action of the link by returning false
    return false;
});

$('#jobseekerbutton').click(function() {     
    // replace the contents of the div with the link text
    $('#signupform #employerform').remove();
    $('#signupform').html($('#jobseekerform').html());
    $('#signupform').hide().fadeIn('slow','linear');   
    
   // $('#signupform').slideDown(1000);    
        

    // cancel the default action of the link by returning false
    return false;
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
