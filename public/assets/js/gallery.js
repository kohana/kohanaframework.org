// Document javascript

$(document).ready(function() {

	$("#galleryContainer").mouseenter(function(event) {
	
		var text = $(event.target).parent().closest();

		$(text).animate({
			top: "180px"
		}, 300);;
	
		$("#gallery div.information").animate({
			top: "180px"
		}, 300);
	});
	
	$("#galleryContainer").mouseleave(function() {
		$("#gallery div.information").animate({
			top: "255px"
		}, 300);
	});

	$("#galleryContainer").slides({
		playInterval: 10000,
		effect: 'slide', 
		navigation: false,
		pagination: false,
		slide: {
			browserWindow: false, 
			interval: 600
		},
		container: "sliderContent"
	});

	$("#whoGallery").slides({
		playInterval: 10000,
		effect: 'slide', 
		navigation: false,
		pagination: false,
		slide: {
			browserWindow: false, 
			interval: 600
		}
	});

	$("#galleryContainer").slides("play");
	$("#whoGallery").slides("play");

});