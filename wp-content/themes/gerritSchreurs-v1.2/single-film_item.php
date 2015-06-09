<?php
/**
 * The template for displaying any single post-type: film_item
 *
 */

get_header(); ?>
<body id="detail-video" <?php body_class(); ?> >

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'lib/parts/header', 'title-film' ); ?>

		<!-- cd-main-content -->
		<main class="cd-main-content">
			<div class="video">
				<div class="videoContainer">
					<div class="videoWrapper">
					<iframe src="https://player.vimeo.com/video/<?php echo get_field(vimeo_embed); ?>?color=ffffff&title=0&byline=0&portrait=0" width="600" height="338" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="content">
				<!-- cd-wrapper -->
				<div class="cd-wrapper">
					<div class="cd-container">
						<h3><?php the_title(); ?></h3>
					</div>
				</div>
				<!-- end cd-wrapper -->
				<!-- cd-wrapper -->
				<div class="cd-wrapper">
					<div class="cd-container half">
						<?php $content = get_field(description_content); ?>
						<?php echo $content ?>
					</div>
					<div class="cd-container half">

						<?php
						if(have_rows('who_does_what')):
							echo '<table><tbody>';
							while( have_rows('who_does_what') ): the_row();
								$what = get_sub_field('what');
								$who = get_sub_field('who');
								echo '<tr><td>'. $what .'</td><td>'. $who .'</td></tr>';
							endwhile;
							echo '<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>';
							echo '</tbody></table>';
						endif;
						?>

					</div>
				</div>
				<!-- end cd-wrapper -->
		</main>
		<!-- cd-main-content -->

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
