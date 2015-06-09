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


});