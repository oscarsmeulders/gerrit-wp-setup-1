jQuery(document).ready(function($){

var pswpElement = document.querySelectorAll('.pswp')[0];





function pswpStartCustom() {
	// initialise as usual
	var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

	// create variable that will store real size of viewport
	var realViewportWidth,
		useLargeImages = false,
		firstResize = true,
		imageSrcWillChange;

	// beforeResize event fires each time size of gallery viewport updates
	gallery.listen('beforeResize', function() {
	// gallery.viewportSize.x - width of PhotoSwipe viewport
	// gallery.viewportSize.y - height of PhotoSwipe viewport
	// window.devicePixelRatio - ratio between physical pixels and device independent pixels (Number)
	// 1 (regular display), 2 (@2x, retina) ...


		// calculate real pixels when size changes
		realViewportWidth = gallery.viewportSize.x * window.devicePixelRatio;

		// Code below is needed if you want image to switch dynamically on window.resize

		// Find out if current images need to be changed
		if(useLargeImages && realViewportWidth < 1000) {
			useLargeImages = false;
			imageSrcWillChange = true;
		} else if(!useLargeImages && realViewportWidth >= 1000) {
			useLargeImages = true;
			imageSrcWillChange = true;
		}

		// Invalidate items only when source is changed and when it's not the first update
		if(imageSrcWillChange && !firstResize) {
			// invalidateCurrItems sets a flag on slides that are in DOM,
			// which will force update of content (image) on window.resize.
			gallery.invalidateCurrItems();
		}

		if(firstResize) {
			firstResize = false;
		}

	    imageSrcWillChange = false;

	});


	// gettingData event fires each time PhotoSwipe retrieves image source & size
	gallery.listen('gettingData', function(index, item) {

		// Set image source & size based on real viewport width
		if( useLargeImages ) {
			item.src = item.originalImage.src;
			item.w = item.originalImage.w;
			item.h = item.originalImage.h;
		} else {
			item.src = item.mediumImage.src;
			item.w = item.mediumImage.w;
			item.h = item.mediumImage.h;
		}

		// It doesn't really matter what will you do here,
		// as long as item.src, item.w and item.h have valid values.
		//
		// Just avoid http requests in this listener, as it fires quite often

	});


	//console.log('pswpStartCustom');
	// Note that init() method is called after gettingData event is bound
	gallery.init();

}


$('.gallery-buttons').on('click', '.button-zoom', function() {
	//var count = $('.is-selected').attr('data-index');
	//alert( $('.is-selected').attr('data-index') );
	options = {
		//index: count, // start with the photo which is selected in detail
		index: $('.is-selected').attr('data-index'), // start at first slide
		captionEl: false,
		arrowEl: false,
		shareEl: false,
		arrowKeys: false,
		fullscreenEl: true,
		counterEl: false,
		zoomEl: true,
		tapToClose: false, // Tap on sliding area should close gallery
	};
	pswpStartCustom();
});


});