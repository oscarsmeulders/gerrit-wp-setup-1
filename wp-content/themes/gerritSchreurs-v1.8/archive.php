<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<body id="detail-photography" <?php body_class(); ?> >

<?php

	$cat = $wp_query->get_queried_object();
	$cat_slug = $cat->slug;
	$idders = array();
	$idders_new = array();
	wp_reset_query();

	$args = array(
		'post_type' => 'photography_item',
		'showposts' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'photography_category',
				'field' => 'slug',
				'terms' => $cat_slug
			)
		),
		'orderby' => 'ID',
		'order' => 'ASC'
	);
	$my_query = new WP_Query($args);

	if ($my_query->have_posts()) :
		while ($my_query->have_posts()) : $my_query->the_post();
			//$my_array[] = get_the_title(get_the_ID());
			array_push($idders, get_the_ID() );
		endwhile;
	endif;
	// debug:
	//print_r($idders);
	//
	foreach ($idders as &$value){
		if ($value == $_GET['id']) {
			//echo 'true ' . $value;
			array_unshift($idders_new, $value);
		} else {
			array_push($idders_new, $value);
		}
	}
	//
	//print_r($idders_new);
	wp_reset_query();


	$args2 = array(
		'post_type' => 'photography_item',
		'showposts' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'photography_category',
				'field' => 'slug',
				'terms' => $cat_slug
			)
		),
		'orderby' => 'post__in',
		'post__in' => $idders_new
	);
	$my_query_new = new WP_Query($args2);

?>

<?php if ( have_posts() ) : ?>
	<?php
		$string_global = '';
		$size_s = 		'detail-s';
		$size_m = 		'detail-m';
		$size_l = 		'detail-l';
		$size_xl = 		'detail-xl';
		$size_orginal =	'detail-orginal';


		$images_enlarge = array();
		$xml_string = '<script type="text/javascript">items = [';
	?>
	<?php
		if (isset($_GET['id'])) {

		}else{
			// Fallback behaviour goes here
		}
		// query_posts($query_string."&post_id=". $_GET['id']. "&order=ID&order=ASC" );
	?>
	<?php $count = 0; ?>
	<?php while ($my_query_new->have_posts()) : $my_query_new->the_post(); ?>
		<?php
			$title = get_the_title();
			$content = get_field(description_content);
			// images listing
			if(have_rows('images_obj')):
				while( have_rows('images_obj') ): the_row();

					$img = 		get_sub_field('image_obj');
					$img_id = 	$img['ID'];
					$img_url_s = 	wp_get_attachment_image_src( $img_id, $size_s );
					$img_url_m = 	wp_get_attachment_image_src( $img_id, $size_m );
					$img_url_l = 	wp_get_attachment_image_src( $img_id, $size_l );
					$img_url_xl = 	wp_get_attachment_image_src( $img_id, $size_xl );
					$img_url_o = 	wp_get_attachment_image_src( $img_id, $size_orginal );
					$alt = 		$img['title'];

					$xml_string .= "
						{	mediumImage: {
								src: '". $img_url_xl[0] ."', w: ". $img_url_xl[1] .", h: ". $img_url_xl[2] ."
							},
							originalImage: {
								src: '". $img_url_o[0]  ."', w: ". $img_url_o[1]  .", h: ". $img_url_o[2]  ."
							}
						},";

					$string =	'<div class="gallery-cell" data-content="'. $content .'" data-title="'. $title .'" data-id="' . get_the_ID() . '" data-index="'. ($count ) .'" data-title="'. $alt .'">
									<img data-src="	<768:'. $img_url_s[0] .',
													<900:'. $img_url_m[0] .',
													<1200:'. $img_url_l[0] .',
													>1200:'. $img_url_xl[0] .'" />
									<noscript><img src="'. $img_url_l[0] .'" /></noscript>
								</div>';
					$string_global .= $string;

					array_push($images_enlarge, $xml_string );
					$count++;
				endwhile;

			endif;

			// end images listing
		?>
		<?php endwhile; ?>
		<?php $xml_string .= '];</script>'; ?>

		<?php get_template_part( 'lib/parts/header', 'cookie-photography-category' ); ?>

		<?php //cd-main-content ?>
		<main class="cd-main-content">
			<div class="gallery">

				<?php echo $string_global; ?>


			</div>
			<div class="gallery-buttons">
				<?php
					if ($count > 1) :
				?>
					<button class="gallery-button button-previous"></button>
					<button class="gallery-button button-next"></button>
				<?php endif; ?>
				<button class="gallery-button button-zoom"></button>
				<button class="gallery-button button-info"></button>
			</div>

			<div class="info hidden displayNone">
				<div class="information">
					<div>
						<h1 class="titleHtml"></h1>
						<span class="contentHtml"></span>
						<div class="close">
							<button class="button-close"></button>
						</div>
					</div>
				</div>
			</div>




		</main>
		<?php //cd-main-content ?>

		<?php get_template_part( 'lib/parts/nav', 'global' ); ?>

<?php endif; ?>

<?php echo $xml_string ?>

<?php get_template_part( 'lib/parts/detail', 'photo-zoom' ); ?>
<?php get_footer();?>
