<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<?php //cookie ?>
	<div class="cookietrail">
		<?php
		// cookie trail photography
		$ID = get_the_ID();
		$divider = ' / ';
		$divider_moreCat = '';
		$photoOverviewPage = get_field( 'photography_overview', 'option' );
		$title = '';
		if( $photoOverviewPage ) {
			$post = $photoOverviewPage;	// override $post
			setup_postdata( $post );
			$title .= '<a href="'. get_the_permalink() .'">'. get_the_title() .'</a>'. $divider;
			$post_categories = get_the_terms( $ID, 'photography_category' );

			foreach ($post_categories as $c) {
				$title .= $divider_moreCat .'<a class="trans" href="'. get_the_permalink() .'#.'. $c->slug .'">'. $c->name .'</a>';
				$divider_moreCat = ', ';
				//echo '<li id="" class="sub-menu-item"><a href="'. get_the_permalink() .'#.'. $term->slug .'" class="menu-link sub-menu-link">'. $term->name .'</a></li>';
			}

			echo '<h1 class="light">'. $title .'</h1>';

	 	}
	 	wp_reset_postdata();
	 	// end photography
	 	?>


	</div>
	<?php //cookie ?>
</header>