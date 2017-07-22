$(document).ready(function ($) {
    
   $("#endofsearch").hide();
   $("#addsuccess").hide(); 
   $(document).on('submit','#quotes-form',function(event){
             event.preventDefault()
             event.stopPropagation();                  
             var quote = $("#quotes-form #quote").val();
             var author = $("#quotes-form #author").val();
            $.ajax({
                    type: "POST",
                    url: 'admin-quotesubmit.php',
                    data: "quote=" + quote + "&author=" + author,
                    dataType: 'html',
                    success: function (html) {  
                        $("#addsuccess").show().fadeIn(1000);
                        $("#quotes-form #quote").val('');
                        $("#quotes-form #author").val('');
                       $("#quotetablebody").html(html).fadeIn(1000);
                         $(function() {
                                $.material.init();
                            });
                    }
           });
        return false;
    });
    
    $('#viewquote-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);   
               var qid =  $(e.relatedTarget).data('qid');
            
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'admin-viewquotemodal.php',
            data: 'qid=' + qid,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
             //   $modal.find('#employerapproveddiv').hide();             
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    $(document).on('submit','#quote-form-modal',function(event){
            event.preventDefault();
            var qid = $('#quote-form-modal #qid').val();
            var mode = $('#quote-form-modal #mode').val();
            $.ajax({    
                        type: "POST",
                        url: 'admin-quotesubmit.php',
                        data:"qid=" + qid + "&mode=" + mode,
                        dataType: 'html',
                        success: function (html) {
                            $('#viewquote-modal').modal('toggle');
                            $("#quotetablebody").html(html).fadeIn(1000);
                            $(function() {
                                $.material.init();
                            });
                            
                        }
            });
            return false;
    });
    
});   