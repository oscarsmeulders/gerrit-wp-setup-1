<?php
/**
 * The template for displaying any single post-type: photography_item
 *
 */

get_header(); ?>
<body id="detail-photography" <?php body_class(); ?> >

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php //echo $the_post->post->ID ?>
		<?php get_template_part( 'lib/parts/header', 'cookie-photography' ); ?>

		<!-- cd-main-content -->
		<main class="cd-main-content">
			<div class="gallery">

				<div class="gallery-cell" data-index="0">
				<img alt=''
					data-src-base='<?php echo get_stylesheet_directory_uri(); ?>/img-temp/responsive/'
					data-src='	<480:x.jpg,
	                			<768:xx.jpg,
								<960:xxx.jpg,
								>960:xxxx.jpg' />
				</div>

				<div class="gallery-cell" data-index="1">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img-temp/enlarge/small.jpg" alt="" />
				</div>
				<div class="gallery-cell" data-index="2">
					<img src="img-temp/enlarge-1/small.jpg" alt="" />
				</div>
			</div>
			<div class="gallery-buttons">
				<button class="gallery-button button-previous"></button>
				<button class="gallery-button button-next"></button>
				<button class="gallery-button button-zoom"></button>
				<button class="gallery-button button-info"></button>
			</div>
			<div class="content"></div>

		</main>
		<!-- cd-main-content -->

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
	<?php endwhile; ?>
<?php endif; ?>


<script type="text/javascript">
items = [
	{
		mediumImage: {
			src: '<?php echo get_stylesheet_directory_uri(); ?>/img-temp/enlarge/medium.jpg',
			w: 1500,
			h: 979
		},
		originalImage: {
			src: '<?php echo get_stylesheet_directory_uri(); ?>/img-temp/enlarge/large.jpg',
			w: 3000,
			h: 1957
		}
	},
	{
		mediumImage: {
			src: '<?php echo get_stylesheet_directory_uri(); ?>/img-temp/enlarge-1/medium.jpg',
			w: 1500,
			h: 998
		},
		originalImage: {
			src: '<?php echo get_stylesheet_directory_uri(); ?>/img-temp/enlarge-1/large.jpg',
			w: 3000,
			h: 1995
		}
	}

];
</script>


<?php get_template_part( 'lib/parts/detail', 'photo-zoom' ); ?>
<?php get_footer();?>
