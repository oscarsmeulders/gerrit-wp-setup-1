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
		}
	 	wp_reset_postdata();
	 	// end photography
	 	$title .=  ' ' .get_the_title();
		echo '<h1 class="light">'. $title .'</h1>';
	 	?>

		<?php //post-nav ?>
		<div class="post-nav">
			<?php
				$size = 			'square';

				if( get_adjacent_post(false, '', true) ) {
					$previous_post =		get_adjacent_post(false, '', true);
					$previous_post_ID = 	$previous_post->ID;
					$previous_post_buton =	previous_post_link('%link', '<button class="post-button button-previous"></button>');
				} else {
					$previous_post_query = new WP_Query('posts_per_page=1&order=DESC&post_type=photography_item');
					if ( $previous_post_query->have_posts() ) {
						while ( $previous_post_query->have_posts() ) {
							$previous_post_query->the_post();
							$previous_post_ID = $previous_post_query->post->ID;
						}
					}
					$previous_post_buton =	'<a href="' . get_permalink() . '"><button class="post-button button-previous"></button></a>';
					wp_reset_query();
				}

				if( get_adjacent_post(false, '', false) ) {
					$next_post =		get_adjacent_post(false, '', false);
					$next_post_ID = 	$next_post->ID;
					$next_post_buton =	next_post_link('%link', '<button class="post-button button-next"></button>');;
				} else {
					$next_post_query = new WP_Query('posts_per_page=1&order=ASC&post_type=photography_item');
					if ( $next_post_query->have_posts() ) {
						while ( $next_post_query->have_posts() ) {
							$next_post_query->the_post();
							$next_post_ID = $next_post_query->post->ID;
						}
					}
					$next_post_buton =	'<a href="' . get_permalink() . '"><button class="post-button button-next"></button></a>';
					wp_reset_query();
				}

				$previous_title =		get_the_title($previous_post_ID);
				$previous_img = 		get_field('thumb', $previous_post_ID);
				$previous_img_id = 		$previous_img['ID'];
				$previous_img_url = 	wp_get_attachment_image_src( $previous_img_id, $size );
				$previous_img_alt =		$previous_img['title'];

				$next_title =		get_the_title($next_post_ID);
				$next_img = 		get_field('thumb', $next_post_ID);
				$next_img_id = 		$next_img['ID'];
				$next_img_url = 	wp_get_attachment_image_src( $next_img_id, $size );
				$next_img_alt =		$next_img['title'];
			?>
			<?php echo $next_post_buton; ?>
			<?php echo $previous_post_buton; ?>

			<div class="post-thumb hidden">
				<div class="post-next-thumb hidden" style="background-image: url('<?php echo $next_img_url[0]; ?>');"></div>
				<div class="post-previous-thumb hidden" style="background-image: url('<?php echo $previous_img_url[0]; ?>');"></div>
			</div>
		</div>
		<?php //post-nav ?>
	</div>
	<?php //cookie ?>
</header>