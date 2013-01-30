$(document).ready(function(){
    		$('.main-content').isotope({
  			itemSelector: '.left-col-box'
  		});
	$(document).on("submit", "#album_name", function(){     
		return false;
	});
	
	$(document).on("click",".delete_button", function() {
		
		var image_src = $(this).parents('.album_image').children('img').attr('src');
		var fileName = image_src.substring(image_src.lastIndexOf("/")+1, image_src.indexOf("&"));
		var data = {id: $(this).attr("id"), fileName: fileName};
		$.post("/ajax/delete_media.php", data, function(d) {
			console.log(d);
		});
		//$(this).parent().parent().parent().remove();
		$('.main-content').isotope('remove', $(this).parent().parent().parent(), function() {console.log('removed');});
	});
});