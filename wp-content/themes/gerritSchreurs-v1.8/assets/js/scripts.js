jQuery(document).ready(function($){

	// post-thumbs click on post-next or post-previous
	$('.no-touch').find('.post-nav').on( 'mouseover click', '.post-button', function() {
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
	
	
	//////
	$('#menu-main').on( 'click', '.sub-menu-item', function() {
		location.reload();
	});



	// material design // click on buttons ripple
	$('.mat-hover').each( function(){
    	$(this).append("<div class='ripple'></div>");
	});  
    $('.mat-hover').click(function(e){
		var $clicked = $(this);
		
		//gets the clicked coordinates
		var offset = $clicked.offset();
		var relativeX = (e.pageX - offset.left);
		var relativeY = (e.pageY - offset.top);
		var width = $clicked.width();
		var height = $clicked.height();

		console.log(width);
		
		var $ripple = $clicked.find('.ripple');
		
		//puts the ripple in the clicked coordinates without animation
		$ripple.addClass('notransition');
		$ripple.css({'top' : relativeY, 'left': relativeX});
		$ripple[0].offsetHeight;
		$ripple.removeClass("notransition");
		
		//animates the button and the ripple
		$clicked.addClass('hovered');
		$ripple.css({ 'width': width * 2, 'height': height*2, 'margin-left': -width, 'margin-top': -height });
      
		setTimeout(function(){
			//resets the overlay and button
			$ripple.addClass('notransition');
			$ripple.attr('style', '');
			$ripple[0].offsetHeight;
			$clicked.removeClass('hovered');
			$ripple.removeClass('notransition');
		}, 300 );
    });


});
	


