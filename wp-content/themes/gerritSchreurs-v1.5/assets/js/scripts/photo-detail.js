jQuery(document).ready(function($){

	////////////////////////////////////////////////
	var $gallery = $('.gallery').flickity({
		cellAlign: 'center',
		percentPosition: false,
		pageDots: false,
		wrapAround: true,
		imagesLoaded: true,
		setGallerySize: false,
		freeScroll: false,
		draggable: false,
		prevNextButtons: false,
		pageDots: false
	});
	$gallery.flickity().focus();

	////////////////////////////////////////////////
	// http://flickity.metafizzy.co/extras.html
	////////////////////////////////////////////////
	// previous
	$('.gallery-buttons .button-previous').on( 'click', function() {
		$gallery.flickity('previous');
	});
	// next
	$('.gallery-buttons .button-next').on( 'click', function() {
		$gallery.flickity('next');
	});
	////////////////////////////////////////////////

	
	$('.gallery-buttons .button-info').on( 'click', function() {
		menuShowHide('.info');
	});
	$('.info .button-close').on( 'click', function() {
		menuShowHide('.info');
	});
	
	function menuShowHide(who) {
		console.log('doe je het?');
		if (!$(who).hasClass('hidden')) {
			$(who).addClass('hidden').delay(200).queue(function(next){
				$(who).addClass('displayNone').dequeue();
			});
			
			$('.gallery-buttons .button-info').removeClass('hidden');
			$('.gallery-buttons .button-zoom').removeClass('hidden');
			$('.gallery-buttons .button-next').removeClass('hidden');
			$('.gallery-buttons .button-previous').removeClass('hidden');
		} else {
			$(who).removeClass('displayNone').delay(200).queue(function(next){
				$(who).removeClass('hidden').dequeue();
			});
			
			$('.gallery-buttons .button-info').addClass('hidden');
			$('.gallery-buttons .button-zoom').addClass('hidden');
			$('.gallery-buttons .button-next').addClass('hidden');
			$('.gallery-buttons .button-previous').addClass('hidden');
		}
		
	}

	
});