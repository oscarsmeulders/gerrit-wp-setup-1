<?php
/**
 * 	Template Name: Home Page
 *
*/
get_header(); ?>

<body id="home" <?php body_class(); ?> >
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'lib/parts/header', 'global' ); ?>

	<?php
		function rndSpeed () {
			return rand(200,1000) * 10;
		}
		function rndDuration () {
			return rand(200,800) * 10;
		}
		// images listing
		$images_photo = array();
		if(have_rows('photography_images')):
			while( have_rows('photography_images') ): the_row();

				$img = 		get_sub_field('photography_image');
				$img_id = 	$img['ID'];
				$size = 	'photography-listing-home';
				$img_url = 	wp_get_attachment_image_src( $img_id, $size );
				$string =	"<div class='slide' data-cycle-speed='". rndSpeed() ."' data-cycle-timeout='". rndDuration() ."' style='background-image: url(". $img_url[0] .")'></div>";
				if( $img_id ) {
					array_push($images_photo, $string );
				}
			endwhile;
		endif;
		// end images listing
	?>
	<?php
		function slideshow_create_photo ($who, $image_array) {
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

	?>

	<!-- cd-main-content -->
	<main class="cd-main-content">
		<div class="panel left">
			<div class="slideshow">
				<div class="one"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-one"
					data-cycle-slides="> div.slide">
						<?php
							$slide_ID = 'images-one';
							echo slideshow_create_photo( $slide_ID, $images_photo );
						?>
				</div>
				<div class="two"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-two"
					data-cycle-slides="> div.slide">
						<?php
							$slide_ID = 'images-two';
							echo slideshow_create_photo( $slide_ID, $images_photo );
						?>
				</div>
				<div class="three"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-three"
					data-cycle-slides="> div.slide">
						<?php
							$slide_ID = 'images-three';
							echo slideshow_create_photo( $slide_ID, $images_photo );
						?>
				</div>
				<div class="four"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-four"
					data-cycle-slides="> div.slide">
						<?php
							$slide_ID = 'images-four';
							echo slideshow_create_photo( $slide_ID, $images_photo );
						?>
				</div>
				<div class="five"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-five"
					data-cycle-slides="> div.slide">
						<?php
							$slide_ID = 'images-five';
							echo slideshow_create_photo( $slide_ID, $images_photo );
						?>
				</div>
				<div class="six"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-six"
					data-cycle-slides="> div.slide">
						<?php
							$slide_ID = 'images-six';
							echo slideshow_create_photo( $slide_ID, $images_photo );
						?>
				</div>
			</div>
			<?php
				$photoOverviewPage = get_field( 'photography_overview', 'option' );
				if( $photoOverviewPage ) {
					$post = $photoOverviewPage;	// override $post
					setup_postdata( $post );
						echo '<a href="'. get_the_permalink() .'"><div class="button">'. __( 'Photography', 'gs_lang' ) .'</div></a>';
			 		wp_reset_postdata();
			 	}
			?>
		</div>
		<div class="panel right">
			<?php
				$filmOverviewPage = get_field( 'film_overview', 'option' );
				if( $filmOverviewPage ) {
					$post = $filmOverviewPage;	// override $post
					setup_postdata( $post );
						echo '<a href="'. get_the_permalink() .'"><div class="button">'. __( 'Film', 'gs_lang' ) .'</div></a>';
			 		wp_reset_postdata();
			 	}
			?>
		</div>
	</main>
	<!-- cd-main-content -->

	<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>