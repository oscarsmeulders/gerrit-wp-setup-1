<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<div class="filters">
		<span><?php _e( 'Filter', 'gs_lang' ); ?></span>
		<?php
			$taxonomies = array(
				'photography_category'
			);
			$args = array(
				'orderby'           => 'name',
				'order'             => 'ASC',
				'hide_empty'        => true
			);
			$terms = get_terms($taxonomies, $args);
			foreach ( $terms as $term ) {
				echo '<button data-filter=".'. $term->slug .'">'. $term->name .'</button>';
     		}
		?>
		<button id="filter-showall" class="hidden" data-filter=""><?php _e( 'Show all', 'gs_lang' ); ?></button>
	</div>
</header>