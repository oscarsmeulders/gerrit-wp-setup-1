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

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<?php
				// images listing
				if(have_rows('images_obj')):
					$images = array();
					while( have_rows('images_obj') ): the_row();
						$img = 		get_sub_field('image_obj');
						$img_id = 	$img['ID'];
						$size = 	'photography-listing';
						$img_url = 	wp_get_attachment_image_src( $img_id, $size );
						$alt = 		$img['title'];
						$string =	'<div class="item fashion">
										<div>
											<a href="#"><img class="ll" width="100%" height="100%" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="'. $alt .'" /></a>
										</div>
									</div>';
						if( $img_id ) {
							array_push($images, $string );
						}
					endwhile;
					shuffle($images);
				endif;
				// end images listing
			?>


		<?php endwhile; ?>
	<?php endif; ?>

		<!-- cd-main-content -->
		<main class="cd-main-content">
			<!-- items -->
			<div class="items">
				<?php
					foreach ($images as $obj) {
						echo $obj;
					}
				?>
				<div class="item item-w2 item-h2 fashion">
					<div>
						<a href="detail.html"><img class="ll" width="100%" height="100%" src="assets/img/src-empty.png" data-original="img-temp/beeld-2.jpg" alt="" /></a>
					</div>
				</div>
				<div class="item fashion">
					<div>
						<a href="detail.html"><img class="ll" width="100%" height="100%" src="assets/img/src-empty.png" data-original="img-temp/beeld-2.jpg" alt="" /></a>
					</div>
				</div>

			</div>
			<!-- end items -->
		</main>
		<!-- end cd-main-content -->

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>


<?php get_footer(); ?>