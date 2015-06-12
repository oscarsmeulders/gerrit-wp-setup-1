<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<div class="title">
		<?php
		// film title
		$ID = get_the_ID();
		$divider = ' / ';
		$filmOverviewPage = get_field( 'film_overview', 'option' );
		$title = '';
		$title_post =get_the_title();
		if( $filmOverviewPage ) {
			$post = $filmOverviewPage;	// override $post
			setup_postdata( $post );
			$title .= '<a href="'. get_the_permalink() .'">'. get_the_title() .'</a>'. $divider;

			echo '<h1 class="light">'. $title . $title_post .'</h1>';

	 	}
	 	wp_reset_postdata();
	 	// end film
	 	?>
		<!-- post-nav -->
		<div class="post-nav">
			<?php
				$size = 			'square';

				if( get_adjacent_post(false, '', true) ) {
					$previous_post =		get_adjacent_post(false, '', true);
					$previous_post_ID = 	$previous_post->ID;
					$previous_post_buton =	previous_post_link('%link', '<button class="post-button button-previous"></button>');
				} else {
					$previous_post_query = new WP_Query('posts_per_page=1&order=DESC&post_type=film_item');
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
					$next_post_query = new WP_Query('posts_per_page=1&order=ASC&post_type=film_item');
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
		<!-- end post-nav -->
	</div>
</header>
<?php
	//echo previous_post_link('%link', 'Previous', $in_same_cat = true);
	//echo next_post_link('%link', 'Next', $in_same_cat = true);
?>

