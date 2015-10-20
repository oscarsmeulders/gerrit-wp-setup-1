<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<div class="title">
		<h1 class="light">
			<?php
				$divider = ' / ';
				if ( $post->post_parent  == '0' || $post->post_parent  == null ) {
					$title = get_the_title( $post->ID );
				} else {
					$title = '<a href="'. get_the_permalink( $post->post_parent ) .'">'. get_the_title( $post->post_parent ). '</a>' . $divider . get_the_title();
				}
				echo $title;
			?>
		</h1>
	</div>
</header>