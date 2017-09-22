$(document).ready(function ($) {
        
    $("a[href='#ajposts']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'employer-activejobposts.php',
            dataType: 'html',
             beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                  },
            success: function (html) {
                    // console.log(html);
                    $('#resume-main-body').html(html);
                $('#successdivdeljob').hide();
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                            });
                ChangeUrl('Job Ads | jobsly', 'employer-main.php?ajax=ajposts');
                $('title').html('Job Ads | jobsly');
                }
               
        });
        return false;
     });
    
    $("a[href='#short']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'employer-shortlist.php',
            dataType: 'html',
             beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                  },
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);               
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                    });
                    ChangeUrl('Shortlisted Applicants | jobsly', 'employer-shortlist.php');
                    $('title').html('Shortlisted Applicants | jobsly');
                }
               
        });
        return false;
     });
    
    $("a[href='#napp']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'employer-newapps.php',
            dataType: 'html',
             beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                  },
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);               
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                    });
                    ChangeUrl('New Applicants | jobsly', 'employer-main.php?ajax=napp');
                    $('title').html('New Applicants | jobsly');
                }
               
        });
        return false;
     });
    
    $("a[href='#search']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'searchresumes.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
             },
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);               
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $(function() {
                                $.material.init();
                    });
                     
                }
               
        });
        return false;
     });
    
     $("a[href='#cinfo']").on('click', function (event){  
        event.preventDefault()
        event.stopPropagation();
        $('#loader').hide();
        $.ajax({
            url: 'employer-companyinfo.php',
            dataType: 'html',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
             },
            success: function (html) {
                       // console.log(html);
                    $('#resume-main-body').html(html);
                    $('#successdivcreg').hide();
                 
                    $('#companyregistration-form').parsley({
                            successClass: "has-success",
                            errorClass: "has-error"
                    });
    
                    $('#cdesc').summernote({
                           toolbar: [
                             // [groupName, [list of button]]
                             ['style', ['bold', 'italic', 'underline', 'clear']], 
                             ['fontsize', ['fontsize']],
                             ['color', ['color']],
                             ['para', ['ul', 'ol', 'paragraph']]
                           ],
                           callbacks: {
                             onPaste: function (e) {
                                 var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                 e.preventDefault();

                                 // Firefox fix
                                 setTimeout(function () {
                                     document.execCommand('insertText', false, bufferText);
                                 }, 10);
                             }
                         }    
                     });
                     
                }
               
        });
        return false;
     });
    
   /* 
    $("#resume-main-body").on('click','#editjob',function(event) {
        event.preventDefault(); 
        var jobid = $(this).data('jobid');
        
        if(jobid > 0){
            $.ajax({    
                        type: "POST",
                        url: 'postajob-form.php',
                        data:"jobid=" + jobid,
                        dataType: 'html',
                        success: function (html) {
                           // console.log(url);
                            $('#resume-main-body').html(html); 
                            $('#resumesb li').removeClass('active');
                            $('#resumesb #p2').addClass('active');
                            $(function() {
                                $.material.init();
                            });
                            $('#resume-main-body #startappdate').datepicker();
                            $('#resume-main-body #endappdate').datepicker();
                            $('#resume-main-body #jobdesc').summernote({
                                   toolbar: [
                                     // [groupName, [list of button]]
                                      ['style', ['bold', 'italic', 'underline', 'clear']],                       
                                      ['fontsize', ['fontsize']],
                                      ['color', ['color']],
                                      ['para', ['ul', 'ol', 'paragraph']]                                     
                                    ],
                                    callbacks: {
                                      onPaste: function (e) {
                                          var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                                          e.preventDefault();

                                          // Firefox fix
                                          setTimeout(function () {
                                              document.execCommand('insertText', false, bufferText);
                                          }, 10);
                                      }
                                    }
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
        }
        return false;
    });
    */
     
    
    
     $('#viewresume-modal').on('show.bs.modal', function(e) {
              
              var $modal = $(this);
             //  $modal.find('#modaleditessay #successdivessaymodal').hide();        
              var mode =  $(e.relatedTarget).data('mode');
              var applicantid =  $(e.relatedTarget).data('applicantid');
              var userid = $(e.relatedTarget).data('userid');
              var jobid = $(e.relatedTarget).data('jobid');
              var view = $(e.relatedTarget).data('view');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'viewresume-modal.php',
            data: 'applicantid=' + applicantid +
                  '&userid=' + userid +
                  '&jobid=' + jobid +
                  '&mode=' + mode +
                  '&view=' + view,
            success: function(data) {
                $modal.find('.modalcontent').html(data);     
                $(function() {
                           $.material.init();
                    });
               
            }
        });
    });
    
    $('#invite-modal').on('show.bs.modal', function(e) {
              
              var $modal = $(this);
             //  $modal.find('#modaleditessay #successdivessaymodal').hide();        
              var mode =  $(e.relatedTarget).data('mode');
              var applicantid =  $(e.relatedTarget).data('applicantid');
              var userid = $(e.relatedTarget).data('userid');
              var jobid = $(e.relatedTarget).data('jobid');
              var view = $(e.relatedTarget).data('view');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'invite-modal.php',
            data: 'applicantid=' + applicantid +
                  '&userid=' + userid +
                  '&jobid=' + jobid +
                  '&mode=' + mode +
                  '&view=' + view,
            success: function(data) {
                $modal.find('.modalcontent').html(data);     
                $(function() {
                           $.material.init();
                    });
               
            }
        });
    });
    
    $(document).on('submit','#invite-form',function(event) {
            event.preventDefault();           
            $('#loader').hide();
            var jobid = $("#invite-form #jobid").val(); 
            var applicantid = $("#invite-form #applicantid").val();
            var mode = $("#invite-form #mode").val();
            var view = $("#invite-form #view").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'invite-submit.php',
                data: 'jobid=' + jobid + '&applicantid=' + applicantid + '&mode=' + mode + '&view=' + view,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                    $('#invite-modal').modal('toggle');
                    if(view=='search'){
                        var li = '#invited' + jobid;
                    }else{
                        var li = '#invited' + applicantid;
                    }
                        $("#matchedtable " + li).html("<i class='fa fa-check text-success'> Invite sent</i>").fadeIn('slow').delay(1000);
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    $("#resume-main-body").on('click','#jobdetails',function(event) {
            event.preventDefault();
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            var page =  $(this).data('page');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-jobdetails.php',
                data: 'jobid=' + jobid + '&page=' + page,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                   // console.log(html);
                    $('#resume-main-body').html(html);                    
                    $('#'+page).click();
                    $(function() {
                               $.material.init();
                    });

                }
            });
      //  return false;
     });
    
    
    
    $("#resume-main-body").on('click','#activeapps',function(event) {
            event.preventDefault();
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            var page =  $(this).data('page');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-loadaapps.php',
                data: 'jobid=' + jobid+ '&page=' + page,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                    //console.log(html);
                    $('#showjobdetail').html(html); 
                    $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });
                    ChangeUrl('Job Applications | jobsly', 'employer-loadaapps.php');
                    $('title').html('Job Applications | jobsly');    
                }
            });
      //  return false;
     });
    
    $("#resume-main-body").on('click','#newapps',function(event) {
            event.preventDefault();
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            var page =  $(this).data('page');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-loadnapps.php',
                data: 'jobid=' + jobid+ '&page=' + page,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                    //console.log(html);
                    $('#showjobdetail').html(html); 
                    $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });
                    ChangeUrl('New Job Applicants | jobsly', 'employer-loadnapps.php');
                    $('title').html('New Job Applicants | jobsly');
                }
            });
      //  return false;
     });
    
    $("#resume-main-body").on('click','#shortlisted',function(event) {
            event.preventDefault();
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            var page =  $(this).data('page');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-loadshortlist.php',
                data: 'jobid=' + jobid+ '&page=' + page,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                    //console.log(html);
                    $('#showjobdetail').html(html); 
                    $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });
                    ChangeUrl('Shortlisted Job Applicants | jobsly', 'employer-loadshortlist.php');
                    $('title').html('Shortlisted Job Applicants | jobsly');
                }
            });
      //  return false;
     });
    
    $("#resume-main-body").on('click','#matched',function(event) {
            event.preventDefault();
            $('#loader').hide();
            var jobid =  $(this).data('jobid');
            var page =  $(this).data('page');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-matchedres.php',
                data: 'jobid=' + jobid+ '&page=' + page,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                    //console.log(html);
                    $('#showjobdetail').html(html); 
                    $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });
                    ChangeUrl('Matched Resumes | jobsly', 'employer-matchedres.php');
                    $('title').html('Matched Resumes | jobsly');    
                }
            });
      //  return false;
     });
    
    $(document).on('click','#shortlistbutton',function(event) {
            var applicantid =  $(this).data('applicantid');
            var jobid =  $(this).data('jobid');
            var mode =  $(this).data('mode');
            var page =  $(this).data('page');
            $('#shortlist-form #applicantid').val(applicantid);
            $('#shortlist-form #jobid').val(jobid);
            $('#shortlist-form #mode').val(mode);
            $('#shortlist-form #page').val(page);
            $('#shortlist-form').submit();
    });  
    
    $(document).on('submit','#shortlist-form',function(event) {
            event.preventDefault();           
            $('#loader').hide();
            var jobid = $("#shortlist-form #jobid").val(); 
            var applicantid = $("#shortlist-form #applicantid").val();
            var mode = $("#shortlist-form #mode").val();
            var page = $("#shortlist-form #page").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-shortlistsubmit.php',
                data: 'jobid=' + jobid + '&applicantid=' + applicantid + '&mode=' + mode + '&page=' + page,
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(html) {
                    //console.log(html);
                    $('#shortlistdiv').html(html);
                    if(mode=='remove'){
                        var tr = '#line' + applicantid;
                        $("#shortlisttable " + tr).fadeOut('slow').delay(1000).hide(0);
                    }
                    if(mode=='add'){
                        var li = '#slline' + applicantid;
                        var curtable = '#activeappstable ';
                        if(page=='newappstable'){
                            curtable = '#newappstable ';
                        }
                        $(curtable + li).html("<button type='button' rel='tooltip' title='Already in shortlist' class='btn btn-success btn-simple btn-xs'><i class='fa fa-check'></i></button>").fadeIn('slow').delay(1000);
                    }
                   // $('#showjobdetail').html(html); 
                  //  $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    /*
    $("#resume-main-body").on('click','#matched',function(event) {
            event.preventDefault();           
            var jobid =  $(this).data('jobid');
            var page =  $(this).data('page');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-matchedres.php',
                data: 'jobid=' + jobid+ '&page=' + page,
                success: function(html) {
                    //console.log(html);
                    $('#showjobdetail').html(html); 
                    $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });
                    ChangeUrl('Matched Resumes | jobsly', 'employer-matchedres.php');
                    $('title').html('Matched Resumes | jobsly');
                }
            });
      //  return false;
     });
    */
    $('#showjob-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);
              // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
               
               var jobid =  $(e.relatedTarget).data('jobid');
               var mode =  $(e.relatedTarget).data('mode');
               var employer =  $(e.relatedTarget).data('employer');    
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'showjob-modal.php',
            data: 'jobid=' + jobid + "&mode=" + mode + "&employer=" + employer,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
                $modal.find('#successdivquickapply').hide();
                $modal.find('#warningdivquickapply').hide();
               // $('#quickapplydiv #successdivquickapply').hide();
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    $('#rejectapp-modal').on('show.bs.modal', function(e) {
             
               var $modal = $(this);
              // $modal.find('#quickapply-form-modal #successdivquickapply').hide();
               
               var jobid =  $(e.relatedTarget).data('jobid');
               var mode =  $(e.relatedTarget).data('mode');
               var applicantid =  $(e.relatedTarget).data('applicantid');
               var page =  $(e.relatedTarget).data('page');
     
        $.ajax({
            cache: false,
            type: 'POST',
            url: 'employer-rejectappmodal.php',
            data: 'jobid=' + jobid + "&mode=" + mode + "&applicantid=" + applicantid + "&page=" + page,
                  
            success: function(data) {
                $modal.find('.modalcontent').html(data);
        
                $(function() {
                           $.material.init();
                });
                
            }
        });
    });
    
    
    $(document).on('click','#aappsloadmore',function(event) {
           // var next = $("#jobseekersloadmore-form #next").val();
            $('#loader').hide();
            var next =  $(this).data('next');
            var search =  $(this).data('search');
            var jobid =  $(this).data('jobid');
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'employer-loadmoreaapps.php',
            data: 'next=' + next + '&search=' + search + '&jobid=' + jobid,
            dataType: 'text',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },    
            success: function(html) {               
                if(html=='end'){
                   $('#resume-main-body #endofsearch').hide();    
                   $('#resume-main-body #endofsearch').fadeIn(1500);
                }else{
                next = next + 10;
                $("#aappsloadmore").data("next", next);
                $("#aappsloadmore").attr("data-next", $("#aappsloadmore").data("next"));      
                $('#aappstablebody').append(html).fadeIn('slow').delay(1000);
                }
                $(function() {
                           $.material.init();
                });
                 ChangeUrl('Job Applications | jobsly', 'employer-loadaapps.php?next='+next);
            }
        });
    });
    
    $(document).on('click','#nappsloadmore',function(event) {
           // var next = $("#jobseekersloadmore-form #next").val();
            $('#loader').hide();
            var next =  $(this).data('next');
            var search =  $(this).data('search');
            var jobid =  $(this).data('jobid');
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'employer-loadmorenapps.php',
            data: 'next=' + next + '&search=' + search + '&jobid=' + jobid,
            dataType: 'text',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },    
            success: function(html) {             
                if(html=='end'){
                   $('#resume-main-body #endofsearch').hide();    
                   $('#resume-main-body #endofsearch').fadeIn(1500);
                }else{
                next = next + 10;
                $("#nappsloadmore").data("next", next);
                $("#nappsloadmore").attr("data-next", $("#nappsloadmore").data("next"));            
                $('#nappstablebody').append(html).fadeIn('slow').delay(1000);
                }
                $(function() {
                           $.material.init();
                });
                ChangeUrl('New Job Applicants | jobsly', 'employer-loadshortlist.php?next='+next);
            }
        });
    });
    
    $(document).on('click','#shortlistloadmore',function(event) {
           // var next = $("#jobseekersloadmore-form #next").val();
            $('#loader').hide();
            var next =  $(this).data('next');
            var search =  $(this).data('search');
            var jobid =  $(this).data('jobid');
            $.ajax({
            cache: false,
            type: 'POST',
            url: 'employer-loadmoreshortlist.php',
            data: 'next=' + next + '&search=' + search + '&jobid=' + jobid,
            dataType: 'text',
            beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },    
            success: function(html) {         
                if(html=='end'){
                   $('#resume-main-body #endofsearch').hide();    
                   $('#resume-main-body #endofsearch').fadeIn(1500);
                }else{
                next = next + 10;
                $("#shortlistloadmore").data("next", next);
                $("#shortlistloadmore").attr("data-next", $("#shortlistloadmore").data("next"));             
                $('#shortlisttablebody').append(html).fadeIn('slow').delay(1000);
                }
                $(function() {
                           $.material.init();
                });
                ChangeUrl('Shortlisted Job Applicants | jobsly', 'employer-loadshortlist.php?next='+next);
            }
        });
    });
    
     $(document).on('submit','#rejectapp-form',function(event) {
            event.preventDefault();           
            $('#loader').hide();
            var jobid = $("#rejectapp-form #jobid").val(); 
            var applicantid = $("#rejectapp-form #applicantid").val();
            var mode = $("#rejectapp-form #mode").val();
            var page =  $("#rejectapp-form #page").val();
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-rejectformsubmit.php',
                data: 'jobid=' + jobid + '&applicantid=' + applicantid + '&mode=' + mode + "&page=" + page,
               // dataType: 'application/json; charset=utf-8',
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(data) {
                    console.log(data);
                    $('#rejectapp-modal').modal('toggle');
                    var myObj = JSON.parse(data);
                    $('#aappsdiv').html(myObj[0]);
                    $('#shortlistdiv').html(myObj[1]);
                    $('#nappsdiv').html(myObj[2]);
                    var mytable = "#activeappstable ";
                    if(page=='short'){
                        mytable = "#shortlisttable ";
                    }
                    if(page=='new'){
                        mytable = "#newappstable ";
                    }
                    if(mode=='reject'){
                        var tr = '#line' + applicantid;
                        $(mytable + tr).fadeOut('slow').delay(1000).hide(0);
                    }
                   
                   // $('#showjobdetail').html(html); 
                  //  $("#jobdetailads").hide();
                    $(function() {
                               $.material.init();
                    });

                }
            });
        return false;
     });
    
    $(document).on('click','#logoupload-modal',function(event) {
            var applicantid =  $(this).data('applicantid');
            var jobid =  $(this).data('jobid');
            var mode =  $(this).data('mode');
            $('#shortlist-form #applicantid').val(applicantid);
            $('#shortlist-form #jobid').val(jobid);
            $('#shortlist-form #mode').val(mode);
            $('#shortlist-form').submit();
    });
    
    $(document).on('submit','#companyregistration-form',function(event) {
            event.preventDefault();
            $('#loader').hide();
            var mode = $("#companyregistration-form #mode").val();
            var userid = $("#companyregistration-form #userid").val();
            var companyname = $("#companyregistration-form #companyname").val(); 
            var companyaddress = $("#companyregistration-form #companyaddress").val();
            var companywebsite = $("#companyregistration-form #companywebsite").val();
            var telno = $("#companyregistration-form #telno").val();
            var companytin = $("#companyregistration-form #companytin").val();
            var cperson = $("#companyregistration-form #cperson").val();
            var designation = $("#companyregistration-form #designation").val();
            var cpersonemail = $("#companyregistration-form #cpersonemail").val();
            var cpersontelno = $("#companyregistration-form #cpersontelno").val();
            var industry = $("#companyregistration-form #industry").val();
            var numemp = $("#companyregistration-form #numemp").val();
            var ctype = $("#companyregistration-form #ctype").val();
            var cdesc = $("#companyregistration-form #cdesc").summernote('code');     
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'employer-registrationsubmit.php',
                data: 'mode=' + mode + '&companyname=' + companyname + '&companyaddress=' + companyaddress + '&mode=' + mode +'&userid=' + userid +'&companywebsite=' + companywebsite +'&telno=' + telno +'&companytin=' + companytin +'&cperson=' + cperson +'&designation=' + designation +'&cpersonemail=' + cpersonemail +'&cpersontelno=' + cpersontelno +'&industry=' + industry +'&numemp=' + numemp +'&ctype=' + ctype +'&cdesc=' + cdesc,
                dataType: 'text',
                beforeSend: function() {
                 $('#loader').show();
                      },
                 complete: function(){
                      $('#loader').hide();
                },
                success: function(data) {
                    //console.log(html);
                   
                    $('#successdivcreg').fadeIn(1500);
                    $(function() {
                               $.material.init();
                    });
                    $('#companyregistration-form').parsley({
                       successClass: "has-success",
                       errorClass: "has-error"
                });
                }
            });
        return false;
     });
    
    $(document).on('click','#printable',function(event){
         event.preventDefault();
         $('#printable-form').submit();
    });
    
    $(document).on('click','#applicantview',function(event){
         event.preventDefault();
         var applicantid =  $(this).data('applicantid');
         $('#resumeinvite-form'+applicantid).submit();
    });
    
    $(document).on('click','#resumeview',function(event){
         event.preventDefault();
         var applicantid =  $(this).data('applicantid');
         $('#viewresume-form'+applicantid).submit();
         $('#nappsdiv').html(napps);
         $("#newbadgediv" + applicantid).html('');
    });
    
});       