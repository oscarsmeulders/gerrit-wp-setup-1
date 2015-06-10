<?php
/**
 * The template for displaying any single post-type: photography_item
 *
 */

get_header(); ?>
<body id="detail-photography" <?php body_class(); ?> >

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php echo $the_post->post->ID ?>
		<?php get_template_part( 'lib/parts/header', 'cookie-photography' ); ?>

		<!-- cd-main-content -->
		<main class="cd-main-content">
			<div class="gallery-buttons">
				<button class="gallery-button button-previous"></button>
				<button class="gallery-button button-next"></button>
				<button class="gallery-button button-zoom"></button>
				<button class="gallery-button button-info"></button>
			</div>
			<div class="gallery">
	
				<div class="gallery-cell" data-index="0">
				<img alt=''
					data-src-base='img-temp/responsive/'
					data-src='	<480:x.jpg,
	                			<768:xx.jpg,
								<960:xxx.jpg,
								>960:xxxx.jpg' />
				</div>
	
				<div class="gallery-cell" data-index="1">
					<img src="img-temp/enlarge/small.jpg" alt="" />
				</div>
				<div class="gallery-cell" data-index="2">
					<img src="img-temp/enlarge-1/small.jpg" alt="" />
				</div>
			</div>
			<div class="content"></div>
			
		</main>
		<!-- cd-main-content -->

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
