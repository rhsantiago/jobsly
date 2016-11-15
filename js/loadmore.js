$(document).ready(function($) {
    
    
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
    
    
    
    
    
    
    
});    