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
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php
				//$title = substr( get_the_title(), 0, 80 ) . '&hellip;';
				$title = get_the_title();
				$post_categories = get_the_terms( $loop->post->ID, 'photography_category' );
				$cats = array();
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
					$id = 0;
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
						$string =	'<div class="item '. $cat_list . $cat_list_size .'">
										<div>
											<a href="'. get_the_permalink().'?id='.$id .'"><img class="ll" width="100%" height="100%" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="'. $alt .'" /></a>
											<div class="title">'. $title .'</div>
										</div>
									</div>';
						if( $img_id ) {
							array_push($images, $string );
						}
						$id++;
					endwhile;
					shuffle($images);
				endif;
				// end images listing
			?>


		<?php endwhile; ?>
	<?php endif; ?>

		<?php // cd-main-content ?>
		<main class="cd-main-content">
			<?php // items ?>
			<div class="items">
				<?php
					foreach ($images as $obj) {
						echo $obj;
					}
				?>
			</div>
			<?php // end items ?>
		</main>
		<?php // end cd-main-content ?>

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>


<?php get_footer(); ?>