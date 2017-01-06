jQuery(document).ready(function ($) {
    
    $("a[href='#ajposts']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
 
        $.ajax({
            url: 'employer-activejobposts.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);
                $('#successdivdeljob').hide();
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                     
                }
               
        });
        return false;
     });
    
    
    
    
    
});       