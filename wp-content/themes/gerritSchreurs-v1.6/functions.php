<?php

// Define the version so we can easily replace it throughout the theme
define( 'gs_version', 1.0 );
define( 'TEMPLATEPATH', get_template_directory_uri(), true );
define( 'SITEPATH', site_url(), true );


/*-----------------------------------------------------------------------------------*/
/* set shortcodes
/*-----------------------------------------------------------------------------------*/
include_once( TEMPLATEPATH . "/lib/functions/shortcodes.php");


/*-----------------------------------------------------------------------------------*/
/* set menu walker
/*-----------------------------------------------------------------------------------*/
include_once( TEMPLATEPATH . "/lib/functions/menu_walker.php");


/*-----------------------------------------------------------------------------------*/
/* clean dashboard + clean menu admin
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

function remove_menus(){

	//remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'edit.php' );                   //Posts
	//remove_menu_page( 'upload.php' );                 //Media
	//remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	//remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'plugins.php' );                //Plugins
	//remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	//remove_menu_page( 'options-general.php' );        //Settings

}
add_action( 'admin_menu', 'remove_menus' );


/*-----------------------------------------------------------------------------------*/
/* custom text dashboard
/*-----------------------------------------------------------------------------------*/
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('sos_global', 'Contact', 'custom_dashboard_sos');
	wp_add_dashboard_widget('sos_updates', 'Updates', 'custom_dashboard_sos_updates');
	wp_add_dashboard_widget('sos_remarks', 'Install', 'custom_dashboard_sos_remarks');
	wp_add_dashboard_widget('images_help_widget', 'Images', 'custom_dashboard_help');
	wp_add_dashboard_widget('shortcodes_help_widget', 'Shortcodes', 'custom_dashboard_help_shortcodes');
	
}
function custom_dashboard_sos() {
	echo '<img src="'. get_template_directory_uri() .'/lib/sos/img/sos_logo.jpg">';
	echo '<h1>Oscar Smeulders</h1>
		<p>
			<span>Phone</span>&nbsp;&nbsp;<a href="tel:0621570942">06 215 70 942</a><br/>
			<span>Email</span>&nbsp;&nbsp;<a href="mailto:info@oscarsmeulders.com">info@oscarsmeulders.com</a><br/>
			<span>Www</span>&nbsp;&nbsp;<a href="http://www.oscarsmeulders.com">oscarsmeulders.com</a>
		</p>';
}

function custom_dashboard_sos_updates() {
	echo '<table style="width:100%">
		<thead>
			<tr>
				<td style="font-weight:600">When</td>
				<td style="font-weight:600">What</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td valign="top" nowrap>2015-07-15&nbsp;&nbsp;</td>
				<td><strong>Add possibility for thumbs in the overview of photography. So we can make different crops for the images.</strong></td>
			</tr>
			<tr>
				<td valign="top" nowrap>2015-07-15&nbsp;&nbsp;</td>
				<td><strong>Changed homepage from "stickers" to "bars"</strong></td>
			</tr>
			<tr>
				<td valign="top" nowrap>2015-07-08&nbsp;&nbsp;</td>
				<td><strong>Added shortcodes to welcome screen</strong></td>
			</tr>
			<tr>
				<td valign="top" nowrap>2015-06-27&nbsp;&nbsp;</td>
				<td><strong>Changed the admin welcome screen</strong></td>
			</tr>
		</tbody>
	</table>';
}

function custom_dashboard_sos_remarks() {
	echo '<ol>
			<li><strong>When activating the theme</strong></li>
			<li>Create a homepage. And let <a href="'. SITEPATH .'/wp-admin/options-reading.php">Wordpress know</a> that this is the home.</li>
			<li>Then create a photography + film page</li>
			<li>Select for both the correct template</li>
			<li>Link the photography + film page in the <em><a href="'. SITEPATH .'/wp-admin/admin.php?page=theme-general-settings">Theme settings</a></em></li>
			<li><a href="'. SITEPATH .'/wp-admin/nav-menus.php">Create a menu</a> and select this menu to <em><a href="'. SITEPATH .'/wp-admin/nav-menus.php">Primary Menu</a></em></li>
		</ol>';
}

function custom_dashboard_help_shortcodes() {
	echo '<p>
		Shortcodes used in the theme, these are only usable in the content templates.

		<table style="width:100%">
		<thead>
			<tr>
				<td style="font-weight:600">Shortcode&nbsp;</td>
				<td style="font-weight:600; width:100%">Explaination</td>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td valign="top">[row]</td>
				<td>Start a row</td>
			</tr>
			<tr>
				<td valign="top">[row-end]</td>
				<td>End a row</td>
			</tr>
			
			<tr>
				<td valign="top">[col]</td>
				<td>Start a col, extra value can be <strong>[col nmb="half"]</strong>. If a half is used, be aware to alway add two, because the column will be half the size.</td>
			</tr>
			<tr>
				<td valign="top">[col-end]</td>
				<td>End a col</td>
			</tr>
			<tr>
				<td valign="top">[client]</td>
				<td><strong>[client name="" where="" link=""]</strong><br/>
					name="<em>Name of the client</em>"<br/>
					where="<em>Where is the client based</em>"<br/>
					link="<em>If you want to link to the client, always add: http:// or https:// in front</em>"
				</td>
			</tr>
			<tr>
				<td valign="top">[br]</td>
				<td>This shortcode will add a white line (break) in the content.</td>
			</tr>
		</tbody>
		</table>';
}

function custom_dashboard_help() {
	echo '<p>
		Images used in the gerrit-theme will be resized to different sizes. Below a listing of all sizes and where they are cropped (or not).

		<table style="width:100%">
		<thead>
			<tr>
				<td style="font-weight:600">Name</td>
				<td style="font-weight:600">Where</td>
				<td style="font-weight:600">Size (px)</td>
				<td align="center" style="font-weight:600">Cropped</td>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>square</td>
				<td>Nav between posts</td>
				<td>200 x 200</td>
				<td align="center">*</td>
			</tr>
			<tr>
				<td>photography-listing</td>
				<td>Overview</td>
				<td>600 x 400</td>
				<td align="center">*</td>
			</tr>
			<tr>
				<td>film-listing</td>
				<td>Overview</td>
				<td>600 x 400</td>
				<td align="center">*</td>
			</tr>
			<tr>
				<td>content-page</td>
				<td>Content + homepage</td>
				<td>1400 width</td>
				<td>&nbsp</td>
			</tr>
			<tr>
				<td>detail-s</td>
				<td>Responsive</td>
				<td>480 width</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>detail-m</td>
				<td>Responsive</td>
				<td>768 width</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>detail-l</td>
				<td>Responsive</td>
				<td>900 width</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>detail-xl</td>
				<td>Responsive</td>
				<td>1600 width</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>detail-orginal</td>
				<td>Responsive</td>
				<td>5000 width</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
		</table>';
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
// add_theme_support('post-thumbnails', array( 'post', 'page' ) );


/*-----------------------------------------------------------------------------------*/
/* add sizes for media
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'image_sizes_theme_setup' );
function image_sizes_theme_setup() {
	add_image_size( 'content-page', 1400 ); // 1400 pixels wide (and unlimited height)
	add_image_size( 'photography-listing', 600, 400, true );
	add_image_size( 'film-listing', 600, 400, true );
	add_image_size( 'square', 300, 300, true );
	/*
	responsive voor vier scherm formaten,
	we rekenen altijd vanuit de breedte (nodig voor WP, we willen niet croppen)
	s = 480px
	m = 768px
	l = 900px
	xl = 1600px
	orignal = 3000px
	*/
	add_image_size( 'detail-s', 480 );
	add_image_size( 'detail-m', 768 );
	add_image_size( 'detail-l', 900 );
	add_image_size( 'detail-xl', 1600 );
	add_image_size( 'detail-orginal', 5000 );
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
/* Custom post types + taxonomies for Gerrit Schreurs
	for the icons:
	https://developer.wordpress.org/resource/dashicons/#format-video
*/
/*-----------------------------------------------------------------------------------*/

function create_photo_tax() {
	register_taxonomy(
		'photography_category',
		'photography_category',
		array(
			'label' => __( 'Category photography' ),
			'rewrite' => array( 'slug' => 'photography_category' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'create_photo_tax' );

function create_film_tax() {
	register_taxonomy(
		'film_category',
		'film_category',
		array(
			'label' => __( 'Category film' ),
			'rewrite' => array( 'slug' => 'film_category' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'create_film_tax' );

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
			'taxonomies' => array('photography_category'),
			'rewrite' => array('slug'=> 'photography', 'with_front'=>false),
			'menu_icon' => 'dashicons-format-image',
			'menu_position' => 5
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
			'taxonomies' => array('film_category'),
			'rewrite' => array('slug'=> 'film', 'with_front'=>false),
			'menu_icon' => 'dashicons-format-video',
			'menu_position' => 5
		)
	);
}
add_action( 'init', 'create_post_type_film' );
/////////
function create_post_type_slideshow() {
	register_post_type( 'slideshow_item',
		array(
			'labels' => array(
				'name' => __( 'Slideshow','gs_lang' ),
				'singular_name' => __( 'Slideshow','gs_lang' ),
				'add_new' => __( 'New slideshow','gs_lang' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'rewrite' => array('slug'=> 'slideshow', 'with_front'=>false),
			'menu_icon' => 'dashicons-format-gallery',
			'menu_position' => 5
		)
	);
}
add_action( 'init', 'create_post_type_slideshow' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function gs_scripts()  {

	// reset
	wp_enqueue_style( 'gs_style_reset',	get_template_directory_uri() . '/assets/css/reset.css', array(), '10000', 'all' );

	// get the theme directory styles and link to it in the header
	wp_enqueue_style( 'gs_style_flickity', 			get_template_directory_uri() . '/assets/lib/flickity/flickity.css', 						array('gs_style_reset'), '10000', 'all' );
	wp_enqueue_style( 'gs_style',			 		get_template_directory_uri() . '/assets/css/style.css',										array('gs_style_reset', 'gs_style_flickity'), '10000', 'all' );
	wp_enqueue_style( 'gs_style_photoswipe', 		get_template_directory_uri() . '/assets/lib/photoswipe/photoswipe.css', 					array('gs_style_reset', 'gs_style'), '10000', 'all' );
	wp_enqueue_style( 'gs_style_photoswipe_skin', 	get_template_directory_uri() . '/assets/lib/photoswipe/gerrit-skin/gerrit-skin.css',		array('gs_style_reset', 'gs_style_photoswipe'), '10000', 'all' );
	

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
//add_filter('acf/load_field/name=description', 'my_acf_load_field');




/*-----------------------------------------------------------------------------------*/
/* Set ACF to custom folder
/*-----------------------------------------------------------------------------------*/
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/lib/acf/';
    return $path;
}


add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/lib/acf/';
    return $dir;
}

add_filter('acf/settings/show_admin', '__return_false'); // hide menu
include_once( get_stylesheet_directory() . '/lib/acf/acf.php' );

/*-----------------------------------------------------------------------------------*/
/* Options pages if ACF is loaded
/*-----------------------------------------------------------------------------------*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position'		=> 4
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Settings',
		'menu_title'	=> 'Social',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Switch language',
		'menu_title'	=> 'Language',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/*-----------------------------------------------------------------------------------*/
/* Include the ACF gerrit settings
/*-----------------------------------------------------------------------------------*/
include_once( TEMPLATEPATH . "/lib/functions/acf_fields.php");


/*-----------------------------------------------------------------------------------*/
/*	Flushing the Rewrite Rules After Switching a Theme
	Let's do an easy one: How do you flush rewrite rules after switching to a new theme, because the new theme has new custom post types?
	// http://code.tutsplus.com/tutorials/fifty-actions-of-wordpress-50-examples-1-to-10--cms-21578
	// Example Source: http://wpdevsnippets.com/flush-rewrite-rules/
/*-----------------------------------------------------------------------------------*/

add_action( 'after_switch_theme', 'after_switch_theme_example' );
 
function after_switch_theme_example() {
    flush_rewrite_rules();
}
 

/*-----------------------------------------------------------------------------------*/
/*	Changing the Logo Above the Login Form
// Example Source: http://wpsnippy.com/add-custom-login-logo-in-your-wordpress-blog/
/*-----------------------------------------------------------------------------------*/
add_action( 'login_enqueue_scripts', 'login_enqueue_scripts_example' );
function login_enqueue_scripts_example() {
 
    echo '<style type="text/css">'
            . '#login h1 a {'
                . 'background-image: url(' . get_bloginfo( 'template_directory' ) . '/lib/sos/img/sos_logo.jpg);'
                . 'background-size: 100% !important;'
                . 'padding-bottom: 10px;'
                . 'width: 150px;'
                . 'height: 150px;'
            . '}'
        . '</style>';
         
}


/*-----------------------------------------------------------------------------------*/
/*	Redirecting User to the Homepage After Logout
/*-----------------------------------------------------------------------------------*/ 
add_action( 'wp_logout', 'wp_logout_example' );
 
function wp_logout_example() {
    wp_redirect( home_url() );
    exit();
}




?>