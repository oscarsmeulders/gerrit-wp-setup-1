jQuery(document).ready(function($){
	var getUrlParameter = function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	};
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
		pageDots: false,
		initialIndex: getUrlParameter('idPhoto')
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

		//console.log('doe je het?');
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

			var title = $('.is-selected').attr('data-title');
			var content = $('.is-selected').attr('data-content');

			$('.titleHtml').html( title );
			$('.contentHtml').html( content );
		}
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	}


});