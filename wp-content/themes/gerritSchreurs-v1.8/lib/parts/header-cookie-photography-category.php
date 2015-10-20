<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<?php //cookie ?>
	<div class="cookietrail">
		<?php
		// cookie trail photography
		$divider = ' / ';
		$divider_moreCat = '';
		$photoOverviewPage = get_field( 'photography_overview', 'option' );
		$title = '';
		$this_category = get_category($cat);
		global $wp_query;
		$term = $wp_query->get_queried_object();		
			
		if( $photoOverviewPage ) {
			$post = $photoOverviewPage;	// override $post
			setup_postdata( $post );
			$title .= '<a href="'. get_the_permalink() .'">'. get_the_title() .'</a>'. $divider;
			$title .= $divider_moreCat .'<a class="trans" href="'. get_the_permalink() .'#.'. $term->slug .'">'. $term->name .'</a>';	
			echo '<h1 class="light">'. $title .'</h1>';
		}
		wp_reset_postdata();
		// end photography
		?>
	</div>
	<?php //cookie ?>
</header>