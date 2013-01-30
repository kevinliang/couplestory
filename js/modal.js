$(document).ready(function(){
	window_height = $(window).scrollHeight;  
	window.window_width = $(window).width();
	window.full_height = document.body.scrollHeight;
	//$('#overlay').css({'height' : window.full_height});
	
	$('.modal_wrapper').each(function() {
		var modal_height = $(this).outerHeight();       
		var modal_width = $(this).outerWidth();
		offsetX = (window_width-modal_width)/2;
		$(this).css({'left': offsetX});
	});
	
	$(document).on("click", ".show_modal", function(){  
		disable_scroll();   
		var modal_id = $(this).attr('name');
		$('.close_modal').attr('name', modal_id);
		$('#'+modal_id).css({'display' : 'block', 'bottom': offsetY*-1.5});
		$('.modal_plain').css({ 'visibility' : 'visible', 'display' : 'block'});
		if($('#overlay').css('display') == "none") {$('#overlay').fadeTo(500,0.95);}
		
		window_height = $(window).height();
		var offsetY = (window_height-$('#'+modal_id).outerHeight())/2;
		$('#'+modal_id).animate({
			bottom: offsetY
		},400);
	});
					
	$('.close_modal').click(function(e) {
		close_overlay();
		close_modal(e);
		close_plain();
	});
	
	$('.close').click(function(e) {
		close_modal(e);
	});
	
	$(document).keyup(function(e) {
		//esc is pressed
		if(e.keyCode == 27) {
			close_overlay();
			close_modal(e);
			close_plain();
		}
	});
});

function enable_scroll() {
	$('body').css({'overflow' : 'auto'});
}

function disable_scroll() {
	$('body').css({'overflow' : 'hidden'});
}

function close_overlay() {
	$('#overlay').fadeOut(200);
	enable_scroll();
}

function close_plain() {
	$('.modal_plain').fadeOut(500);
}

function close_modal(event, close) {
	if(typeof(close)==='undefined') {
		var modal_id = $('.close_modal').attr('name');  
	}
	else {
		var modal_id = $(event.target).attr('close');
	}
	
	var modal_height = $('#'+modal_id).height();       
	$('#'+modal_id).animate({
		bottom: modal_height*-1.5,
	},250);		
}

function close_specific_modal_all(selector) {
	var modal_height = selector.height();
	var scroll_height = document.body.scrollHeight
	var offset = ((scroll_height-window_height)+modal_height);
	selector.animate({
		bottom: offset*-1,
	},250);
}
