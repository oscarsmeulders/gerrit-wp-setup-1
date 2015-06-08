<header>
	<?php get_template_part( 'lib/parts/header', 'logo-menu' ); ?>
	<div class="title">
		<h1 class="light"><?php the_title(); ?></h1>
		<div class="post-nav">
			<?php
				echo next_post_link('%link', '<button class="post-button button-next"></button>');
				echo previous_post_link('%link', '<button class="post-button button-previous"></button>');
			?>
		</div>
	</div>
</header>
<?php
	//echo previous_post_link('%link', 'Previous', $in_same_cat = true);
	//echo next_post_link('%link', 'Next', $in_same_cat = true);
?>

