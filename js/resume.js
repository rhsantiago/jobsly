$(document).ready(function($) {
    $('#pinfo').click(function() {  
        $.ajax({
                    url: 'personalinfo-form.php',
                    dataType: 'html',

                    success: function (html) {
                        console.log(html);
                        $('#resume-main-body').html(html);
                        //$('#loading').hide();
                    }
        });
        return false;
    });
    
    $('#jobexpec').click(function() {  
        $.ajax({
                    url: 'jobexpectation-form.php',
                    dataType: 'html',

                    success: function (html) {
                        console.log(html);
                        $('#resume-main-body').html(html);
                        //$('#loading').hide();
                    }
        });
        return false;
    });
    

    
    
});    