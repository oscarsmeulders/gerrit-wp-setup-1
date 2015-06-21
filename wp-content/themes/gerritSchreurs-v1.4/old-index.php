<?php
get_header(); ?>

<body id="home" <?php body_class(); ?> >
<?php
	$args = array(
		'posts_per_page' => 9999,
		'post_type' => 'film_item'
	);
	query_posts($args);
?>
<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
<?php
	$post_type = get_post_type( $post->ID );
	echo $post_type;
?>
<?php endwhile; ?>
<?php endif; ?>
test
<?php get_footer(); ?>