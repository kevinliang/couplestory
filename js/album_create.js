$(document).ready(function() {

function updateProgress(evt) {
    // evt is an ProgressEvent.
    if (evt.lengthComputable) {
      var percentLoaded = Math.round((evt.loaded*100 / evt.total));
      // Increase the progress bar length.
      $("progress").attr("value", percentLoaded);
    }
}
	$('#album-files').change(function(event) {
/*	
		var reader = new FileReader();

	//	reader.onload = function(f) {shipOff(f);};
		reader.onerror = function(event) {
    	console.error("File could not be read! Code " + event.target.error.code);
		};
		//reader.onloadstart = ...
		reader.onprogress = updateProgress;
		//reader.onabort = ...
		//reader.onloadend = ...
		reader.readAsBinaryString(event.target.files[0]);
	
	*/
	var data = new FormData();
	var len = this.files.length, i=0;
	
	for(; i<len; i++) {
		file = this.files[i];	
		data.append("media[]", file);
	}
	
	var theName = $('#aName').val();
	var path = window.location.pathname;
	var page = path.substring(1, path.lastIndexOf('/'));
	
	if(page == "album") {
  	var album_id = path.substring(path.lastIndexOf('/') + 1, path.length);
  	var url = '/ajax/album_create.php?album_id='+album_id;
  }
	else {
	  var url= '/ajax/album_create.php';
	}
	
	$.post('ajax/album_name.php', {aName: theName}, function(data) {console.log(data); return false;});
 
    $.ajax({
			url: url,
			data: data,
			dataType: "html",
			contentType: false,
			processData: false,
			type: 'POST',
			success: function(data){
				//	var populate = "<div class='left-col-box'><div class='image_settings'>Hi</div><div class='album_image'><div class='image_settings'><button class='delete_button' id='11'>Delete</button></div><img src='/includes/thumber.php?file=../img/27.png?>&width=218&height=218' /></div></div>";
					//document.location.reload(true);
					//console.log(data);
					close_overlay();
					close_specific_modal_all($('#add_media'));
					close_plain();

					//$('.main-content').load(function() {$(data).hide().prependTo('.main-content').fadeIn('slow');});
					/*$('img',data).load(function(){
      $(data).hide().prependTo('.main-content').fadeIn(5000);
   });*/
   				var area = $(data).prependTo('.main-content').find('div.album_image img');
   				$('.main-content').isotope('reloadItems').isotope({sortBy: 'original-order'});				
   				area.hide();
   				area.load(function() { area.fadeIn(1000);});

					return false;
    	},
    	xhr: function() {
            myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){
                myXhr.upload.addEventListener('progress',updateProgress, false);
            } else {
                console.log("Upload progress is not supported.");
            }
            return myXhr;
        }
		});
		
		
    return false;
	})
});