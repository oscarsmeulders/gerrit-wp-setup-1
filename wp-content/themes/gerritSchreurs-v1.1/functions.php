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
include_once( TEMPLATEPATH . "/lib/functions/shortcodes.php");


/*-----------------------------------------------------------------------------------*/
/* set menu walker
/*-----------------------------------------------------------------------------------*/
include_once( TEMPLATEPATH . "/lib/functions/menu_walker.php");


/*-----------------------------------------------------------------------------------*/
/* custom text dashboard
/*-----------------------------------------------------------------------------------*/
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Images', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	echo '<p>here all the info how to size the images all over the website</p>
		<ul>
			<li>content-page<br/>
			1600px width</li>
			<li>photography-listing<br/>
			600x400px</li>
		</ul>';
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');



/*-----------------------------------------------------------------------------------*/
/* set language PO & MO files
/*-----------------------------------------------------------------------------------*/
add_action('after_setup_theme', 'language_theme_setup');
function language_theme_setup(){
    load_theme_textdomain('gs_lang', TEMPLATEPATH . '/lib/languages');
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
	add_image_size( 'content-page', 1600 ); // 1600 pixels wide (and unlimited height)
	add_image_size( 'photography-listing', 600, 400, true );
}


/*-----------------------------------------------------------------------------------*/
/* disable the emoji stuff from the head, WP 4.2
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
/* Custom post types for Gerrit Schreurs
/*-----------------------------------------------------------------------------------*/
function create_post_type_photo() {
	register_post_type( 'photography_item',
		array(
			'labels' => array(
				'name' => __( 'Photography','gs_lang' ),
				'singular_name' => __( 'Photography','gs_lang' ),
				'add_new' => __( 'New photography','gs_lang' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array('title','post-thumbnails'),
			'taxonomies' => array('category'),
			'rewrite' => array('slug'=> _( 'photography','gs_lang' ), 'with_front'=>false)
		)
	);
}
// 'page-attributes'
add_action( 'init', 'create_post_type_photo' );
/////////
function create_post_type_film() {
	register_post_type( 'film_item',
		array(
			'labels' => array(
				'name' => __( 'Film','gs_lang' ),
				'singular_name' => __( 'Film','gs_lang' ),
				'add_new' => __( 'New film','gs_lang' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array('title','post-thumbnails'),
			'taxonomies' => array('category'),
			'rewrite' => array('slug'=> _( 'film','gs_lang' ), 'with_front'=>false)
		)
	);
}
add_action( 'init', 'create_post_type_film' );

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
add_filter('acf/load_field/name=description', 'my_acf_load_field');


/*-----------------------------------------------------------------------------------*/
/* Options pages
/*-----------------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Settings',
		'menu_title'	=> 'Social',
		'parent_slug'	=> 'theme-general-settings',
	));

}
?>