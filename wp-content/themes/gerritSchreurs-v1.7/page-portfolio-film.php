<?php
/**
 * 	Template Name: Portfolio Film
 *
 */

get_header();?>
<body id="portfolio-film" <?php body_class(); ?> >
	<?php $loop = new WP_Query( array( 'post_type' => 'film_item') ); ?>
	<?php if ( $loop->have_posts() ) : ?>

		<?php get_template_part( 'lib/parts/header', 'title' ); ?>


		<?php // cd-main-content ?>
		<main class="cd-main-content">
			<?php // items ?>
			<div class="items">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
						$size = 'photography-listing';
						$title =		get_the_title($loop->post->ID);
						$img = 			get_field('thumb', $loop->post->ID);

						$img_id = 		$img['ID'];
						$img_url = 		wp_get_attachment_image_src( $img_id, $size );
						$img_alt =		$img['title'];
					?>
					<?php // item ?>
					<div class="item">
						<div class="item-image">
							<?php echo '<a href="'. get_the_permalink() .'"><img class="ll" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="'. $img_alt .'" /></a>'; ?>
						</div>
						<div class="item-title equalHeights"><h4><?php echo $title ?></h4></div>
					</div>
					<?php // item ?>
				<?php endwhile; ?>
			</div>
			<?php // items ?>
		</main>
		<?php // cd-main-content ?>
	<?php endif; ?>
	<?php get_template_part( 'lib/parts/nav', 'global' ); ?>


<?php get_footer(); ?>