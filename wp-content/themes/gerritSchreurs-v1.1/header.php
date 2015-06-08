<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
	<?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
</title>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/lib/modernizr/modernizr.js"></script>
<script src="//use.typekit.net/rem1tld.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>

</head>
