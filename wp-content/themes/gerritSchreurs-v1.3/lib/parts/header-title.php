<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<div class="title">
		<h1 class="light">
			<?php
				$divider = ' / ';
				if ( !empty( $post->post_parent ) ) {
					$title = get_the_title( $post->ID );
				}
				$title = get_the_title( $post->post_parent ) . $divider . get_the_title();
				echo $title;
			?>
		</h1>
	</div>
</header>