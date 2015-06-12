<nav id="cd-lateral-nav">

	<ul class="cd-navigation cd-single-item-wrapper">
		<li><a class="" href="#0">Switch to english</a></li>
	</ul>


	<!-- custom pages -->
	<?php
		echo '<ul id="menu-main" class="cd-navigation">';
			// photography
			$photoOverviewPage = get_field( 'photography_overview', 'option' );
			if( $photoOverviewPage ) {
				$post = $photoOverviewPage;	// override $post
				setup_postdata( $post );
					echo '<li id="" class="menu-item-has-children"><a href="'. get_the_permalink() .'" class="menu-link main-menu-link">'. get_the_title() .'</a>';
						$taxonomies = array(
							'photography_category'
						);
						$args = array(
							'orderby'           => 'name',
							'order'             => 'ASC',
							'hide_empty'        => true
						);
						$terms = get_terms($taxonomies, $args);
						echo '<ul class="sub-menu menu-odd  menu-depth-1">';
							foreach ( $terms as $term ) {
								echo '<li id="" class="sub-menu-item"><a href="'. get_the_permalink() .'#.'. $term->slug .'" class="menu-link sub-menu-link">'. $term->name .'</a></li>';
							}
							echo '<li id="" class="sub-menu-item"><a href="'. get_the_permalink() .'" class="menu-link sub-menu-link">'. __( 'Show all', 'gs_lang' ) .'</a></li>';
						echo '</ul>';
					echo '</li>';
		 		wp_reset_postdata();
		 	}
		 	// end photography
		 	// film
		 	$filmOverviewPage = get_field( 'film_overview', 'option' );
			if( $filmOverviewPage ) {
				$post = $filmOverviewPage;	// override $post
				setup_postdata( $post );
					echo '<li id="" class=""><a href="'. get_the_permalink() .'" class="menu-link main-menu-link">'. get_the_title() .'</a></li>';
				wp_reset_postdata();
			}
			// end film
		echo '</ul>';
	?>
	<!-- end custom pages -->



	<?php wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'walker' => new gerrit_walker_nav_menu(),
				'container'       => false,
				'menu_class'      => 'cd-navigation',
			)
		);
	?>

	<div class="cd-navigation socials">
		<?php
		$twitterLink = get_field( 'twitter_link', 'option' );
		if( $twitterLink ) {
			echo '<a target="_blank" class="cd-twitter cd-img-replace" href="'. $twitterLink .'">Twitter</a>';
		}

		$facebookLink = get_field( 'facebook_link', 'option' );
		if( $facebookLink ) {
			echo '<a target="_blank" class="cd-facebook cd-img-replace" href="'. $facebookLink .'">Facebook</a>';
		}

		$linkedLink = get_field( 'linkedIn_link', 'option' );
		if( $linkedLink ) {
			echo '<a target="_blank" class="cd-linkedin cd-img-replace" href="'. $linkedLink .'">LinkedIN</a>';
		}

		$instagramLink = get_field( 'instagram_link', 'option' );
		if( $instagramLink ) {
			echo '<a target="_blank" class="cd-instagram cd-img-replace" href="'. $instagramLink .'">LinkedIN</a>';
		}

		$tumblrLink = get_field( 'tumblr_link', 'option' );
		if( $tumblrLink ) {
			echo '<a target="_blank" class="cd-tumblr cd-img-replace" href="'. $tumblrLink .'">LinkedIN</a>';
		}

		$googleLink = get_field( 'google_plus_link', 'option' );
		if( $googleLink ) {
			echo '<a target="_blank" class="cd-google cd-img-replace" href="'. $googleLink .'">Google Plus</a>';
		}

		$githubLink = get_field( 'github_link', 'option' );
		if( $githubLink ) {
			echo '<a target="_blank" class="cd-github cd-img-replace" href="'. $githubLink .'">Git Hub</a>';
		}
		?>
	</div> <!-- socials -->
</nav>


