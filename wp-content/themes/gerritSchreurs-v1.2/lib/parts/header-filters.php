<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<div class="filters">
		<span><?php _e( 'Filter', 'gs_lang' ); ?></span>
		<button data-filter=".fashion">fashion</button>
		<button data-filter=".product">product</button>
		<button data-filter=".musicanten">musicanten</button>
		<button id="filter-showall" class="hidden" data-filter="*"><?php _e( 'Show all', 'gs_lang' ); ?></button>
	</div>
</header>