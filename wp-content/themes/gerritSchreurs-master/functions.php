<?php

// Define the version so we can easily replace it throughout the theme
define( 'gs_version', 1.0 );
define( 'TEMPLATEPATH', get_template_directory_uri(), true );

/*-----------------------------------------------------------------------------------*/
/* clean dashboard
/*-----------------------------------------------------------------------------------*/
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


/*-----------------------------------------------------------------------------------*/
/* set shortcodes
/*-----------------------------------------------------------------------------------*/
include_once( TEMPLATEPATH . "/functions_shortcodes.php");

/*-----------------------------------------------------------------------------------*/
/* set language pot files
/*-----------------------------------------------------------------------------------*/
add_action('after_setup_theme', 'language_theme_setup');
function language_theme_setup(){
    load_theme_textdomain('gs_lang', get_template_directory() . '/languages');
}


/*-----------------------------------------------------------------------------------*/
/* add featured image in post and page
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );


/*-----------------------------------------------------------------------------------*/
/* add sizes for media
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'image_sizes_theme_setup' );
function image_sizes_theme_setup() {
	add_image_size( 'content-page', 1600 ); // 300 pixels wide (and unlimited height)
}


/*-----------------------------------------------------------------------------------*/
/* disable the emoji stuff from the head
/*-----------------------------------------------------------------------------------*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
	array(
		'primary'	=>	__( 'Primary Menu', 'main' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu,
		// just change the 'primary' to another name
	)
);


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function gs_scripts()  {

	// reset
	wp_enqueue_style( 'gs_style_reset',	get_template_directory_uri() . '/assets/css/reset.css', array(), '10000', 'all' );

	// get the theme directory styles and link to it in the header
	wp_enqueue_style( 'gs_style_flickity', 			get_template_directory_uri() . '/assets/lib/flickity/flickity.css', 						array('gs_style_reset'), '10000', 'all' );
	wp_enqueue_style( 'gs_style_photoswipe', 		get_template_directory_uri() . '/assets/lib/photoswipe/photoswipe.css', 					array('gs_style_reset', 'gs_style_flickity'), '10000', 'all' );
	wp_enqueue_style( 'gs_style_photoswipe_skin', 	get_template_directory_uri() . '/assets/lib/photoswipe/default-skin/default-skin.css',		array('gs_style_reset', 'gs_style_photoswipe'), '10000', 'all' );
	wp_enqueue_style( 'gs_style',			 		get_template_directory_uri() . '/assets/css/style.css',										array('gs_style_reset', 'gs_style_photoswipe_skin'), '10000', 'all' );

	// jquery
	if( !is_admin()){
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery',		get_template_directory_uri() . '/assets/js/plugins/jquery-1.11.1.js', array('gs_modernizr'), gs_version, false);

	}

	// plugin & script
	wp_enqueue_script( 'gs_plugin',		get_template_directory_uri() . '/assets/js/min/plugins-min.js', array(), gs_version, true );
	wp_enqueue_script( 'gs_script',		get_template_directory_uri() . '/assets/js/min/scripts-min.js', array('gs_plugin'), gs_version, true );

}
add_action( 'wp_enqueue_scripts', 'gs_scripts' );


/*-----------------------------------------------------------------------------------*/
/* strip empty p + br made by shortcodes
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
/*-----------------------------------------------------------------------------------*/
function shortcode_empty_paragraph_fix( $content ) {

	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
	);
	return strtr( $content, $array );

}
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );
?>