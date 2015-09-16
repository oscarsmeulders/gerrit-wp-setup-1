<?php
/**
 * The template for displaying 404 pages (Not Found)

*/
get_header(); ?>
<body id="error" <?php body_class(); ?> >
	<?php get_template_part( 'lib/parts/header', 'title-error' ); ?>
	<?php //cd-main-content ?>
	<main class="cd-main-content">
		<div class="panel text">
			<div class="cd-wrapper">
				<div class="cd-container">
					<a href="/">
						<div class="button">
							<div class="contents">
								<?php _e( 'Not Found', 'gs_lang' ); ?>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</main>
	<?php //cd-main-content ?>
	<?php get_template_part( 'lib/parts/nav', 'global' ); ?>
<?php get_footer(); ?>