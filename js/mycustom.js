/* hide panel body
$(function() {
    $('.panel-image img.panel-image-preview').on('click', function(e) {
	    $(this).closest('.panel-image').toggleClass('hide-panel-body');
    });
});
*/

$(document).ready(function($) {

    $('.card__share > a').on('click', function(e){ 
        e.preventDefault() // prevent default action - hash doesn't appear in url
        $(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
        $(this).toggleClass('share-expanded');
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
    })