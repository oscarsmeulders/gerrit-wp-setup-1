<?php
/**
 * The template for displaying any single post-type: photography_item
 *
 */

get_header(); ?>
<body id="detail-photography" <?php body_class(); ?> >

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'lib/parts/header', 'cookie-photography' ); ?>

		<!-- cd-main-content -->
		<main class="cd-main-content">
			<div class="gallery">

				<?php
					$size_s = 		'detail-s';
					$size_m = 		'detail-m';
					$size_l = 		'detail-l';
					$size_xl = 		'detail-xl';
					$size_orginal =	'detail-orginal';

					$images_enlarge = array();
					$xml_string = '<script type="text/javascript">items = [';

					// images listing
					if(have_rows('images_obj')):
						$count = 0;
						while( have_rows('images_obj') ): the_row();
							$count++;
							$img = 		get_sub_field('image_obj');
							$img_id = 	$img['ID'];

							$img_url_s = 	wp_get_attachment_image_src( $img_id, $size_s );
							$img_url_m = 	wp_get_attachment_image_src( $img_id, $size_m );
							$img_url_l = 	wp_get_attachment_image_src( $img_id, $size_l );
							$img_url_xl = 	wp_get_attachment_image_src( $img_id, $size_xl );
							$img_url_o = 	wp_get_attachment_image_src( $img_id, $size_orginal );

							$alt = 		$img['title'];

							$xml_string .= "
								{
									mediumImage: {
										src: '". $img_url_xl[0] ."',
										w: ". $img_url_xl[1] .",
										h: ". $img_url_xl[2] ."
									},
									originalImage: {
										src: '". $img_url_o[0] ."',
										w: ". $img_url_o[1] .",
										h: ". $img_url_o[2] ."
									}
								},";

							$string =	'<div class="gallery-cell" data-index="'. ($count-1) .'">
											<img alt="'. $alt .'"
												data-src="	<768:'. $img_url_s[0] .',
															<900:'. $img_url_m[0] .',
															<1200:'. $img_url_l[0] .',
															>1200:'. $img_url_xl[0] .'" />
										</div>';
							echo $string;
							array_push($images_enlarge, $xml_string );
						endwhile;

					endif;
					$xml_string .= '];</script>';
					// end images listing
				?>


			</div>
			<div class="gallery-buttons">
				<?php
					if ($count > 1) :
				?>
					<button class="gallery-button button-previous"></button>
					<button class="gallery-button button-next"></button>
				<?php endif; ?>
				<button class="gallery-button button-zoom"></button>
				<button class="gallery-button button-info"></button>
			</div>
			<div class="content"></div>

		</main>
		<!-- /cd-main-content -->

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php echo $xml_string ?>

<?php get_template_part( 'lib/parts/detail', 'photo-zoom' ); ?>
<?php get_footer();?>
