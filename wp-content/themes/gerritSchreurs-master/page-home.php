<?php
/**
 * 	Template Name: Home Page
 *
*/
get_header(); ?>

<body id="home" <?php body_class(); ?> >

	<?php get_template_part( 'parts/header', 'global' ); ?>

	<!-- cd-main-content -->
	<main class="cd-main-content">
		<div class="panel left">
			<div class="slideshow">
				<div class="one"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-one"
					data-cycle-slides="> div.slide">

					<div class="slide" style='background-image: url(img-temp/slider/1.jpg)'></div>

					<script id="images-one" type="text/cycle">
					[
					"<div class='slide' style='background-image: url(img-temp/slider/2.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/3.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/4.jpg)'></div>"
					]
					</script>
				</div>
				<div class="two"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-two"
					data-cycle-slides="> div.slide">

					<div class="slide" style='background-image: url(img-temp/slider/4.jpg)'></div>

					<script id="images-two" type="text/cycle">
					[
					"<div class='slide' style='background-image: url(img-temp/slider/6.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/1.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/2.jpg)'></div>"
					]
					</script>
				</div>
				<div class="three"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-three"
					data-cycle-slides="> div.slide">

					<div class="slide" style='background-image: url(img-temp/slider/5.jpg)'></div>

					<script id="images-three" type="text/cycle">
					[
					"<div class='slide' style='background-image: url(img-temp/slider/2.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/3.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/4.jpg)'></div>"
					]
					</script>
				</div>
				<div class="four"
					data-cycle-fx="scrollHorz"
					data-cycle-progressive="#images-four"
					data-cycle-slides="> div.slide">

					<div class="slide" style='background-image: url(img-temp/slider/6.jpg)'></div>

					<script id="images-four" type="text/cycle">
					[
					"<div class='slide' style='background-image: url(img-temp/slider/1.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/2.jpg)'></div>",
					"<div class='slide' style='background-image: url(img-temp/slider/5.jpg)'></div>"
					]
					</script>
				</div>
			</div>
			<div class="button"><?php _e( 'Photography', 'gs_lang' ); ?></div>
		</div>
		<div class="panel right">
			<div class="button"><?php _e( 'Film', 'gs_lang' ); ?></div>
		</div>
	</main>
	<!-- cd-main-content -->
	<?php get_template_part( 'parts/nav', 'global' ); ?>
<?php get_footer(); ?>