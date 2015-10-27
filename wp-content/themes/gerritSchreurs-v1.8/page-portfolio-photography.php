<?php
/**
 * 	Template Name: Portfolio Photograpy
 *
 */

get_header();?>
<body id="portfolio-photography" <?php body_class(); ?> >
	<?php $loop = new WP_Query( array( 'post_type' => 'photography_item') ); ?>
	<?php if ( $loop->have_posts() ) : ?>

		<?php get_template_part( 'lib/parts/header', 'filters' ); ?>

		<?php $images = array(); ?>
		<?php $slideshows = array(); ?>
		<?php $cats = array(); ?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php
				//$title = substr( get_the_title(), 0, 80 ) . '&hellip;';

				$title = get_the_title();
				$post_categories = get_the_terms( $loop->post->ID, 'photography_category' );
				$cat_list = '';
				if ($post_categories) {
					foreach ($post_categories as $c) {
						$cat_list .= ' ' . $c->slug;
					}
				}

			?>

			<?php
				// images listing
				if(have_rows('images_obj')):
					$idPhoto = 0;
					while( have_rows('images_obj') ): the_row();

						$double = get_sub_field_object('double_size');
						$value = $double['value'][0];
						$cat_list_size = '';
						if ($value) {
							$cat_list_size = " item-w2 item-h2 ";
						}
						if (get_sub_field('thumb')) {
							$img = 		get_sub_field('thumb');
						} else {
							$img = 		get_sub_field('image_obj');
						}
						$img_id = 	$img['ID'];
						$size = 	'photography-listing';
						$img_url = 	wp_get_attachment_image_src( $img_id, $size );
						$alt = 		$img['title'];
						// <a href="'. get_the_permalink().'?id='.$id .'"><img class="ll" width="100%" height="100%" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="'. $alt .'" />
						$terms = get_terms( 'photography_category' );
						$string =	'<div class="item '. $cat_list . $cat_list_size .'">
										<div>
											<a href="'. get_term_link( $c ) .'?id='.$loop->post->ID .'&idPhoto='. $idPhoto .'"><img class="ll" width="100%" height="100%" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="'. $alt .'" />
											<div class="title">'. $title .'</div></a>
										</div>
									</div>';
						if( $img_id ) {
							array_push($images, $string );
						}
						$idPhoto++;
					endwhile;
					shuffle($images);
				endif;
				// end images listing
			?>

			<?php // add slideshow objects ?>
			<?php

				$post_categories = get_the_terms( $loop->post->ID , 'photography_category' );
				if ($post_categories) {
					foreach ($post_categories as $c) {
						if ( ! in_array( $c->slug , $cats )) {
							//echo $c->slug . ' ';
							$string =	'<a href="'. get_term_link( $c ) .'"><div class="item slideshow '. $c->slug .' initially-hidden">
											<div>
												'. __( 'View', 'gs_lang' ). ' ' . $c->name .'
											</div>
										</div></a>';
							array_push( $cats, $c->slug );
							array_push( $slideshows, $string );
						}

					}
				}

			?>
			<?php // end slideshow objects ?>



		<?php endwhile; ?>
	<?php endif; ?>
	<?php
	/*
		foreach ($slideshows as $slides) {
			array_push($images, $slides );
		}
	*/
		$reversed_images = array_reverse($images);
	?>
	<?php // cd-main-content ?>
	<main class="cd-main-content">
		<?php // items ?>
		<div class="items">
			<?php
				foreach ($reversed_images as $obj) {
					echo $obj;
				}
			?>
		</div>
		<?php // end items ?>
	</main>
	<?php // end cd-main-content ?>

	<?php get_template_part( 'lib/parts/nav', 'global' ); ?>


<?php get_footer(); ?>