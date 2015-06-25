jQuery(document).ready(function($){

	$('.left .slideshow .one').cycle({});
	$('.right .slideshow .one').cycle({});

	// http://jquery.malsup.com/cycle/timeout.html
});

jQuery(document).ready(function($){
	var $lateral_menu_trigger = $('#cd-menu-trigger'),
		$content_wrapper = $('.cd-main-content'),
		$content_wrapper_fixed = $('.cd-main-content-fixed'),
		$navigation = $('header');

	//open-close lateral menu clicking on the menu icon
	$lateral_menu_trigger.on('click', function(event){
		event.preventDefault();

		$lateral_menu_trigger.toggleClass('is-clicked');
		$navigation.toggleClass('lateral-menu-is-open');
		$content_wrapper.toggleClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
			$('body').toggleClass('overflow-hidden');
		});
		$content_wrapper_fixed.toggleClass('lateral-menu-is-open')
		$('#cd-lateral-nav').toggleClass('lateral-menu-is-open');

		//check if transitions are not supported - i.e. in IE9
		if($('html').hasClass('no-csstransitions')) {
			$('body').toggleClass('overflow-hidden');
		}
	});

	//close lateral menu clicking outside the menu itself
	$content_wrapper.on('click', function(event){
		if( !$(event.target).is('#cd-menu-trigger, #cd-menu-trigger span') ) {
			$lateral_menu_trigger.removeClass('is-clicked');
			$navigation.removeClass('lateral-menu-is-open');
			$content_wrapper.removeClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$content_wrapper_fixed.removeClass('lateral-menu-is-open')
			$('#cd-lateral-nav').removeClass('lateral-menu-is-open');
			//check if transitions are not supported
			if($('html').hasClass('no-csstransitions')) {
				$('body').removeClass('overflow-hidden');
			}

		}
	});
	//close lateral menu clicking outside the menu itself
	$content_wrapper_fixed.on('click', function(event){
		if( !$(event.target).is('#cd-menu-trigger, #cd-menu-trigger span') ) {
			$lateral_menu_trigger.removeClass('is-clicked');
			$navigation.removeClass('lateral-menu-is-open');
			$content_wrapper.removeClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$content_wrapper_fixed.removeClass('lateral-menu-is-open')
			$('#cd-lateral-nav').removeClass('lateral-menu-is-open');
			//check if transitions are not supported
			if($('html').hasClass('no-csstransitions')) {
				$('body').removeClass('overflow-hidden');
			}

		}
	});

	//open (or close) submenu items in the lateral menu. Close all the other open submenu items.
	$('.menu-item-has-children').children('a').on('click', function(event){
		event.preventDefault();
		$(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(200).end().parent('.item-has-children').siblings('.item-has-children').children('a').removeClass('submenu-open').next('.sub-menu').slideUp(200);
	});

});

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


	console.log('pswpStartCustom');
	// Note that init() method is called after gettingData event is bound
	gallery.init();

}


$('.gallery-buttons').on('click', '.button-zoom', function() {
	//var count = $('.is-selected').attr('data-index');

	options = {
		//index: count, // start with the photo which is selected in detail
		captionEl: false,
		arrowEl: true,
		shareEl: false,
		fullscreenEl: true,
		counterEl: false,
		zoomEl: true,
		tapToClose: false, // Tap on sliding area should close gallery
	};
	pswpStartCustom();
});


});

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


});

jQuery(document).ready(function($){

	////////////////////////////////////////////////////////////////////////////////////
	///// isotope stuff

	var $win = $(window),
		$imgs = $('img.ll'),
		$con = $('#portfolio-photography .items');

	function loadVisible($els, trigger) {
		$els.filter(function () {
			var rect = this.getBoundingClientRect();
			return rect.top >= 0 && rect.top <= window.innerHeight;
		}).trigger(trigger);
	}

	$win.on('scroll', function () {
		loadVisible($imgs, 'lazylazy');
	});

	$imgs.lazyload({
		effect: "fadeIn",
		failure_limit: Math.max($imgs.length - 1, 0),
		event: 'lazylazy'
	});
	//
	////////////////////////////////////////////////////////////////////////////////////
	// filter items on button click
	$('.filters').on( 'click', 'button', function() {

		var filterValue = $(this).attr('data-filter');
		changeClasses( $(this) );

		window.location.hash = filterValue;

		isotopeFilter(filterValue);

		$('html, body').animate({ scrollTop: 0 }, 'fast');
	});
	//
	////////////////////////////////////////////////////////////////////////////////////
	// Change classes of filter buttons
	//
	changeClasses = function (who) {
		if ( $( who ).attr('id') == 'filter-showall') {
			if ( $(who).hasClass('hidden')) {
				$(who).removeClass('hidden');
			} else {
				$(who).addClass('hidden').delay(200).queue(function(next){
					$(who).addClass('displayNone').dequeue();
					});
			}
		} else {
			$('#filter-showall').removeClass('hidden displayNone');
		}
		$('.filters button').removeClass('active');
		$(who).addClass('active');
	}
	//
	////////////////////////////////////////////////////////////////////////////////////
	// mouseover the image
	//
	if ( $('#portfolio-photography').length ) {
		$('.items').on( 'mouseover', '.item', function() {
			$('.item').removeClass('active');
			$(this).addClass('active');
		});
		$('.items').on( 'mouseout mouseleave', '.item', function() {
			$('.item').removeClass('active');
		});
	}


/*
	function heightTitleGet() {
		$('.item').each( function() {
			$height = $(this).find('div.title').outerHeight();
			console.log( $height );
			if (  $height > 42 ) {
				$(this).find('div.title').addClass('double');
			} else {
				$(this).find('div.title').removeClass('double');
			}
		});
	}
	$( window ).resize(function() {
		heightTitleGet();
	});
	setTimeout(heightTitleGet, 1000);
*/

	////////////////////////////////////////////////////////////////////////////////////
	var colWidth = function () {

		if ( $( window ).width() < 768 ) {
			$mobile = true;
		} else {
			$mobile = false;
		}

		var w = $con.width(),
			columnNum = 1,
			columnWidth = 0;

		if (w > 1500) {
			columnNum  = 6;
		} else if (w > 1200) {
			columnNum  = 5;
		} else if (w > 900) {
			columnNum  = 4;
		} else if (w > 600) {
			columnNum  = 3;
		} else if (w > 300) {
			columnNum  = 2;
		}
		columnWidth = Math.floor(w/columnNum);
		$con.find('.item').each(function() {
			var $item = $(this);

			if (!$mobile) {
				var multiplier_w = $item.attr('class').match(/item-w(\d)/);
				var multiplier_h = $item.attr('class').match(/item-h(\d)/);
			}

			var width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth;
			var height = multiplier_h ? columnWidth*multiplier_h[1]*0.66666 : columnWidth*0.66666;
			$item.css({
				width: width,
				height: height
			});
		});
		return columnWidth;
	};


	isotope = function () {
		$con.isotope({
			itemSelector: '.item',
			masonry: {
				columnWidth: colWidth()
			}
		});
	};
	isotopeFilter = function(hash) {
		console.log('isotope filter : ' + hash);
		$con.isotope({ filter: hash });
	}


	hash = window.location.hash.substr(1);
	isotope();
	if (hash) {
		console.log ('hash : ' + hash);
		isotopeFilter(hash);

		$('.filters').find('button').each(function() {
			if ($(this).attr('data-filter') == hash) {
				changeClasses( $(this) );
			}
		});


	}

	$win.on('debouncedresize', isotope);


	$con.isotope('on', 'layoutComplete', function () {
		loadVisible($imgs, 'lazylazy');
	});

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// fade in random all items
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function Shuffle(o) {
		for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	};

	var portfolioFades = [];
	$con.find('.item').each(function() { portfolioFades.push($(this)) });

	Shuffle(portfolioFades);

	for (var i=0;i < portfolioFades.length;i++) {
		var $dly = i*50;
		portfolioFades[i].delay($dly).queue(function(next){
			$(this).addClass('loaded').dequeue();
		});
	}





});

jQuery(document).ready(function($){

	// film overview page

	/* 	get heights of tallest content */
	function heightEqualFn () {
		var $maxHeight_item_titles = null;
		$('.equalHeights').each(function() {
			$maxHeight_item_titles = $maxHeight_item_titles > $(this).height() ? $maxHeight_item_titles : $(this).height();
			//console.log (maxHeightN);
		});
		$('.equalHeights').each(function() {
			$(this).height($maxHeight_item_titles);
		});

	}
	/* 	end get heights of tallest content */
	heightEqualFn();

	$( window ).resize(function() {
		heightEqualFn();
	});


	// film overview page hover over item, fade the rest away
	if ( $('#portfolio-film').length ) {
		$( '.item' ).on( 'mouseover', function() {
			allToAlpha( $(this) );
		});
		$( '.item' ).on( 'mouseout', function() {
			$('.item').each(function() {
				$(this).removeClass('active');
			});
		});
	}

	function allToAlpha( who ) {
		$('.item').each(function() {
			$(this).addClass('active');
		});
		$(who).removeClass('active');
	}
});

jQuery(document).ready(function($){

	// Target your .container, .wrapper, .post, etc.
	$(".videoWrapper").fitVids();



});

jQuery(document).ready(function($){

	$('.cd-main-content-fixed').cycle({});

});

jQuery(document).ready(function($){

	// post-thumbs click on post-next or post-previous
	$('.post-nav').on( 'mouseover click', '.post-button', function() {
		$('.post-thumb').removeClass('hidden');

		if ( $(this).hasClass('button-next') ) {
			$('.post-previous-thumb').addClass('hidden');
			$('.post-next-thumb').removeClass('hidden');
		} else {
			$('.post-previous-thumb').removeClass('hidden');
			$('.post-next-thumb').addClass('hidden');
		}

	});
	$('.post-nav').on( 'mouseout mouseleave', '.post-button', function() {
		$('.post-thumb').addClass('hidden');
	});

	$('#menu-main').on( 'click', '.sub-menu-item', function() {
		location.reload();
	});



});




