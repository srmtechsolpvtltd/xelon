jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});

// JavaScript Document
//DRAG N DROP

$('#videoCont').ezdz({
            text: 'Drag n Drop files from your computer<div class="clearfix"></div><small style="font-size: 13px;">( .mov, .mp4, .avi )</small>',
            validators: {
                maxWidth:  1920,
                maxHeight: 1000
            },
			
            reject: function(file, errors) {
              if (errors.mimeType) {
				  
                  $("#videoErr").html(file.name + ' must be an video file( .mov, .mp4, .avi ).');
                  $("#videoErr").show();
               }

               if (errors.maxWidth) {
                  $("#videoErr").html(file.name + ' must be width:1920px max.');
                  $("#videoErr").show();
               }

                if (errors.maxHeight) {
                    $("#videoErr").html(file.name + ' must be height:1000px max.');
                    $("#videoErr").show();
                }
            }
        });

$('#waterMark').ezdz({
            text: 'Drag n Drop files from your computer<div class="clearfix"></div><small style="font-size: 13px;">( .jpeg or.png )</small>',
            validators: {
                maxWidth:  null,
                maxHeight: null
            },
             reject: function(file, errors) {
              if (errors.mimeType) {
                  $("#watermarkErr").html(file.name + ' must be an image file( .jpeg or.png ).');
                  $("#watermarkErr").show();
				  $("#coverImageErr").html(file.name + ' must be an image file( .jpeg or.png ).');
				  $("#coverImageErr").show();
               }

               
            }  
        });
$('#audio').ezdz({
            text: 'Drag n Drop files from your computer<div class="clearfix"></div><small style="font-size: 13px;">( .wav or .mp3 )</small>',
            validators: {
                maxWidth:  null,
                maxHeight: null
            } ,
            
            reject: function(file, errors) {
              if (errors.mimeType) {
				  
                  $("#audioErr").html(file.name + ' must be an audio file( .wav or .mp3 ).');
                  $("#audioErr").show();
               }
		   }
             
        });		

		
		
//DATE PICKER


		

//Expand
$("#expand").click(function () {
		
	  $('#check').toggleClass('col-xs-8');
	  $('#template').toggleClass('display_none');
	  $('#check').toggleClass('col-xs-6');
	  $('#video-info').toggleClass('col-xs-offset-2');
	  $('#toggle_icon').toggleClass('expand_pos collapse_pos');
	  
    });
	
	$(window).load(function(e) {
            $('#calSec').append($('.dhtmlxcalendar_dhx_skyblue'));
			$('.dhtmlxcalendar_dhx_skyblue').css({'top':'35px','right':'0px'})
        });
	
// DATE PICKER	
	var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["calendar"]);
			myCalendar.setPosition(myCalendar,-230, 190);
			
		}
		
	
$('.video_form_part').width( $('.video_form_part').width() + 30 );
$('.video_preview_heading').width( $('.video_preview_heading').width() + 50 );	

	/*$("#Preview").click(function(e){
		
		$(".over_lay-new").show();
			//var submitprocessingmsg = '<img src="http://xelon.srmtechsol.com/images/loader.gif"/>'; 
			//jQuery.blockUI({ message: submitprocessingmsg,css: { backgroundColor: 'transparent', border: 'none' } });
		});*/
	
	
	function saveVideo()
		{
			
			$("input[name='submitMode']").val("0");
			$("#channelErr").html();
			var channel_id=$("select[name='channel']").val();
			if(channel_id==0)
			{
			$("#channelErr").html("Please select channel.");
			$("#channelErr").show();
			}
			else
			{	
			$("#channelErr").html();
			$("#channelErr").hide();
			$("#videoReleaseForm").submit();
			$(".over_lay-new").show();
			}
			
		}
		
		function shareVideo()
		{
			$("input[name='submitMode']").val("1");
			$("#channelErr").html();
			var channel_id=$("select[name='channel']").val();

			if(channel_id==0)
			{
			$("#channelErr").html("Please select channel.");
			$("#channelErr").show();
			}
			else
			{
			$("#channelErr").html();
			$("#channelErr").hide();
			$("#videoReleaseForm").submit();
			$(".over_lay-new").show();
			}
		}

$(function(){
	var ink, d, x, y;
	$(".ripplelink").click(function(e){
    if($(this).find(".ink").length === 0){
        $(this).prepend("<span class='ink'></span>");
    }
         
    ink = $(this).find(".ink");
    ink.removeClass("animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = e.pageX - $(this).offset().left - ink.width()/2;
    y = e.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("animate");
});
});		


//MANAGE HEIGHT

$(document).ready(function() {
  var desiredHeight = $("body").height() - $(".main-header").height() - $(".main-footer").height() - 70;
  $(".about_content").css("min-height", desiredHeight );
});

$(window).resize(function() {
  var desiredHeight = $("body").height() - $(".main-header").height() - $(".main-footer").height() - 70;
  $(".about_content").css("min-height", desiredHeight );
});





//LOGIN ERROR
/*$(document).ready(function(){
        $('.btn_sign').click(function(){
            $('.log-error').addClass('wrong-entry');
           $('.alert').fadeIn(500);
          // setTimeout( "$('.alert').fadeOut(1500);",3000 );
        });
        $('.form-control').keypress(function(){
            $('.log-error').removeClass('wrong-entry');
        });

    });*/
 
$(document).ready(function(){
	
	$("select[name='channel']").on("change",function(){
		if($("select[name='channel']").val()!=0)
		{
			$("#channelErr").html("");
		}
		});
	
	$("input[name='template']:radio").on("change",function(){
		
		       $("#tempErr").html("");
			   $("#templateError").html("");
		});
	
	$("input[name='title']").blur(function(){
		if($("input[name='title']").val()!='')
		{
			$("#titleError").html("");
			$("#titleErr").html("");
		}
		});
	$("textarea[name='meta_description']").blur(function(){
		if($("textarea[name='meta_description']").val()!='')
		{
			$("#desptitleErr").html("");
			$("#metadescriptionErr").html("");
		}
		});
	$("input[name='audio_file']").blur(function(){
		if($("file[name='audio_file']").val()!='')
		{
			$("#audioError").html("");
			$("#audioErr").html("")
		}
		});
	$("input[name='cover_image']").blur(function(){
		if($("file[name='cover_image']").val()!='')
		{
			$("#imageErr").html("");
			$("#coverImageErr").html("");
		}
		});
	$("input[name='watermark']").blur(function(){
		if($("file[name='watermark']").val()!='')
		{
			$("#imageErr").html("");
			$("#watermarkErr").html("");
		}
		});
	$("input[name='title_track']").blur(function(){
		if($("input[name='title_track']").val()!='')
		{
			$("#trackErr").html("");
			$("#tracktitleErr").html("");
		}
		});
	$("input[name='artist_name']").blur(function(){
		if($("input[name='artist_name']").val()!='')
		{
			$("#artistErr").html("");
			$("#artistNameErr").html("");
		}
		});
	$("input[name='video']").blur(function(){
		if($("file[name='video']").val()!='')
		{
			$("#videoError").html("");
			$("#videoErr").html("");
		}
		});
	
	$("input[name='release_date']").blur(function(){
		if($("input[name='release_date']").val()!='')
		{
			$("#releaseErr").html("");
			$("#ReleaseError").html("");
		}
		});
	

	});

function showPreview(posterPath,videoPath) {
   var RootPath="../packshot/videoOverlayTemplates/";
   $("#my-video").attr('poster',RootPath+posterPath);
   $("#mp4source").attr('src',RootPath+videoPath+'.mp4');
   $("#webmsource").attr('src',RootPath+videoPath+'.webm');
   $(".modal-body video")[0].load();  
   
}

$(document).ready(function(){
	$("#PackshotPreview").on('submit',function(e){
		$(".Error").hide();
		$("#templateError").html("");
		$("#titleErr").html("");
		$("#metadescriptionErr").html("");
		$("#tagErr").html("");
		$("#audioErr").html("");
		$("#coverImageErr").html("");
		$("#tracktitleErr").html("");
		$("#artistNameErr").html("");
		$("#releaseErr").html("");
		if (!$("input[name='template']:radio:checked").val() || $("input[name='title']").val()=='' || $("textarea[name='meta_description']").val()=='' || $("textarea[name='meta_tag']").val()=='' || $("input[type='file'][name='audio_file']").val()=='' || $("input[type='file'][name='cover_image']").val()=='' || $("input[name='release_date']").val()=='') {
			
			$(".Error").show();
			if (!$("input[name='template']:radio:checked").val()) {
                $("#templateError").html("Please select a template.");
            }
			if ($("input[name='title']").val()=='') {
               $("#titleErr").html("Title is required.");
            }
			if ($("textarea[name='meta_description']").val()=='') {
               $("#metadescriptionErr").html("Description is required.");
            }
			if ($("textarea[name='meta_tag']").val()=='') {
               $("#tagErr").html("Tag is required.");
            }
			
			if ($("input[type='file'][name='audio_file']").val()=='') {
              $("#audioErr").html("Source audio file is required.");
            }
			if ($("input[type='file'][name='audio_file']").val()!='' && !validateaudioFile($("input[type='file'][name='audio_file']").val())) {
			    $("#audioErr").html("Source audio file Allowed  type [mp3,wav].");
            }
			if ($("input[type='file'][name='cover_image']").val()=='') {
              $("#coverImageErr").html("Cover image is required.");
            }
			
			if ($("input[name='release_date']").val()=='') {
              $("#releaseErr").html("Release Date is required.");
            }
			e.preventDefault();
        }
		else{
			$(".over_lay-new").show();
		}
		});
	
	$("#VideoReleasePreview").on('submit',function(e){
	
		$(".Error").hide();
		$("#titleErr").html("");
		$("#metadescriptionErr").html("");
		$("#tagErr").html("");
		$("#videoErr").html("");
		$("#watermarkErr").html("");
		$("#releaseErr").html("");
		
		if ($("input[name='title']").val()=='' || $("textarea[name='meta_description']").val()=='' ||
			$("textarea[name='meta_tag']").val()=='' || $("input[type='file'][name='video']").val()=='' || $("input[type='file'][name='watermark']").val()==''|| $("input[name='release_date']").val()=='') {
			
			$(".Error").show();
			
			if ($("input[name='title']").val()=='') {
               $("#titleErr").html("Title is required.");
            }
			if ($("textarea[name='meta_description']").val()=='') {
               $("#metadescriptionErr").html("Description is required.");
            }
			if ($("textarea[name='meta_tag']").val()=='') {
               $("#tagErr").html("Tag is required.");
            }
			if ($("input[type='file'][name='video']").val()=='') {
             
			  $("#videoErr").html("Source video file is required.");
            }
			if ($("input[type='file'][name='video']").val()!='' && !validateVideoFile($("input[type='file'][name='video']").val())) {
               
			    $("#videoErr").html("Source video file Allowed  type [mp4,mov,avi].");
            }
			if ($("input[type='file'][name='watermark']").val()=='') {
              $("#watermarkErr").html("Watermark image is required.");
            }
			if ($("input[name='release_date']").val()=='') {
              $("#releaseErr").html("Release Date is required.");
            }
			e.preventDefault();
        }
		else{
			$(".over_lay-new").show();
		}
		});
	
	$("select[name='channel']").on('change',function(e){
		            $(".credentials").hide();
					var token=$('meta[name="_token"]').attr('content');
					var siteurl="http://localhost/xelon/public";
				  if ($("select[name='channel']").val()!=0) {
                    
					jQuery.ajax({
					url: siteurl+"/user/getChannelCredentials",
					data: {'_token':token,'channel_id':$("select[name='channel']").val()},
					type: "POST",
					dataType: "json",
					success: function(data) {
						$.each(data,function(index,val){
							if (index=="username") {
                                $("#channel_username").html(val);
								
                            }
							if (index=="password") {
                                $("#channel_password").html(val);
                            }
							$(".credentials").show();
							});
					}
					});
				  }
		
		
		});
	
	});

function validateVideoFile(file)
{
		var exts = ['mp4','mov','avi'];
		if ( file ) {
		var get_ext = file.split('.');
		get_ext = get_ext.reverse();
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		return true;
		} else {
		return false;
		}
	    }
}

function validateaudioFile(file)
{
		var exts = ['mp3','wav'];
		if ( file ) {
		var get_ext = file.split('.');
		get_ext = get_ext.reverse();
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		return true;
		} else {
		return false;
		}
	    }
}



