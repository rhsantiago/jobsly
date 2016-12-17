jQuery(document).ready(function ($) {
    
    $("a[href='#pjobad']").on('click', function (){  
        event.preventDefault()
        event.stopPropagation();
        $.ajax({
            url: 'postajob-form.php',
            dataType: 'html',

            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);                    
                    $('#resume-main-body #startappdate').datepicker();
                    $('#resume-main-body #endappdate').datepicker();
                    $('#resume-main-body #jobdesc').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                      ['para', ['ul', 'ol', 'paragraph']]                                     
                                    ]
                          });
                    $('#resumesb li').removeClass('active');
                    $('#resumesb #p2').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                     $('#postajob-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error",
                            classHandler: function (el) {
                                return el.$element.closest(".form-group");
                            },
                            errorsContainer: function (el) {
                                return el.$element.closest(".form-group");
                            },
                     });
                }
               
        });
        return false;
    });


});  