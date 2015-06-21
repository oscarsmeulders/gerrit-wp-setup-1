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