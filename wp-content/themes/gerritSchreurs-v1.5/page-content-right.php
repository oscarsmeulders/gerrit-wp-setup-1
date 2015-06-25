<?php
/**
 * 	Template Name: Content - right
 *
*/
get_header(); ?>

<body id="content" <?php body_class('right divide-two'); ?> >
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'lib/parts/header', 'title-trans' ); ?>

			<?php //cd-main-content ?>
			<main class="cd-main-content">
				<div class="panel text">
					<?php the_content(); ?>
				</div>
			</main>
			<?php //cd-main-content ?>

			<?php //cd-main-content-fixed ?>
			<main class="cd-main-content-fixed"
				data-cycle-progressive="#images-slideshow"
				data-cycle-slides="> div.slide">
				<?php
					$slideshow = get_field('select_slideshow');
					if( $slideshow ):
						// override $post
						$post = $slideshow;
						setup_postdata( $post );
						$images_slideshow = array();
						if(have_rows('slideshow_images')):
							while( have_rows('slideshow_images') ): the_row();
								$img = 		get_sub_field('slideshow_image');
								$img_id = 	$img['ID'];
								$size = 	'content-page';
								$img_url = 	wp_get_attachment_image_src( $img_id, $size );
								$string =	"<div class='slide' style='background-image: url(". $img_url[0] .")'></div>";
								if( $img_id ) {
									array_push($images_slideshow, $string );
								}
							endwhile;
						endif;

						function slideshow_create ($who, $image_array) {
							$images_length = count($image_array);
							$slide_string = '';
							shuffle($image_array);
							for ($i = 0; $i < 1; $i++ ) {
								$slide_string .= $image_array[$i];
							}
							$slide_string .= '<script id="'. $who .'" type="text/cycle">[';
							for ($i = 1; $i < $images_length; $i++ ) {
								$slide_string .= '"'. $image_array[$i] .'"';
								if ($i < ($images_length-1)) {
									$slide_string .= ',';
								}
							}
							$slide_string .= ']</script>';
							return $slide_string;
						}
						$slide_ID = 'images-slideshow';
						echo slideshow_create( $slide_ID, $images_slideshow );
					?>
					<?php wp_reset_postdata(); ?>
				<?php else: // no slideshow is selected so choose thumb ?>
					<?php
						$size = 		'content-page';
						$img = 			get_field('thumb', $post->ID);
						$img_id = 		$img['ID'];
						$img_url = 		wp_get_attachment_image_src( $img_id, $size );
					?>
					<div class="panel image" style="background-image: url('<?php echo $img_url[0]; ?>')">&nbsp;</div>
				<?php endif; ?>

			</main>
			<?php //cd-main-content-fixed ?>

			<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>