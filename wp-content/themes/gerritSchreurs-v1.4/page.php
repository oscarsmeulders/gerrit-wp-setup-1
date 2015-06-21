<?php
/**
 * The template for displaying any single page.
 *
 */

get_header();?>
<body id="content" <?php body_class('divide-two'); ?> >
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'lib/parts/header', 'title' ); ?>

		<!-- cd-main-content -->
		<main class="cd-main-content">
			<div class="panel text">
				<?php the_content(); ?>
			</div>
		</main>
		<!-- cd-main-content -->
		<!-- cd-main-content-fixed-->
		<main class="cd-main-content-fixed">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'content-page' ); ?>
				<div class="panel image" style="background-image: url('<?php echo $image[0]; ?>')">
					&nbsp;
				</div>
			<?php endif; ?>
		</main>
		<!-- cd-main-content-fixed -->

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>