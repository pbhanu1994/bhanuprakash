jQuery(document).ready(function($) { //noconflict wrapper
	$('input#submit').addClass('btn btn-primary');
	
	$("#commentform").removeAttr("novalidate");

	$("#bbp_topic_submit").removeClass('button submit').addClass('btn btn-primary');
	$("#bbp_reply_submit").removeClass('button submit').addClass('btn btn-primary');
	$(".bbp-submit-wrapper button").removeClass('button submit').addClass('btn btn-primary');

	$("input#bbp_search").attr("placeholder", "Search ...").val("").focus().blur();

    // Target your .container, .wrapper, .post, etc.
    $("#video-frame").fitVids();

});//end noconflict