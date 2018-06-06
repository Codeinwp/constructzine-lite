<?php
/*
* 	The template for displaying Header.
*
* 	@package ThemeIsle
*/
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'title' ); ?>">

	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php

$header_image = get_header_image();

if ( ! empty( $header_image )) {
?>

<header style="background-image: url('<?php header_image(); ?>'); ">

<?php } else { ?>

<header class="header-responsive"
	style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/header.png');">

<?php
}

?>



<div class="layer">


<div class="inner">

<div class="header-top cf">

		<?php

		if ( get_theme_mod( 'ti_header_logo', get_stylesheet_directory_uri() . '/images/logo.png' ) ) {
			?>
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'title' ); ?>" id="logo">
				<img src="<?php echo esc_url( get_theme_mod( 'ti_header_logo', get_stylesheet_directory_uri() . '/images/logo.png' ) ); ?>" alt="<?php bloginfo( 'title' ); ?>"
				 title="<?php bloginfo( 'title' ); ?>"/>
			</a>

		<?php } else {
				echo '<div id="no-logo">';
					echo '<h1 class="site-title">';
						echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>';
					echo '</h1>';
					echo '<h2 class="site-description">' . get_bloginfo( 'description' ) . '</h2>';
				echo '</div>';
}

		?>


	<p class="call-for-action">
			<?php
			if ( get_theme_mod( 'ti_header_contact_title','Contact us now: ' ) ) {
				echo esc_attr( get_theme_mod( 'ti_header_contact_title','Contact us now: ' ) );
			}
			?>
			<span>
				<?php
				if ( get_theme_mod( 'ti_header_contact_telephone','(+4) 0746.000.111' ) ) {
					echo '<a href="tel:' . esc_attr( get_theme_mod( 'ti_header_contact_telephone','(+4) 0746.000.111' ) ) . '" title="' . esc_attr( get_theme_mod( 'ti_header_contact_telephone','(+4) 0746.000.111' ) ) . '">' . esc_attr( get_theme_mod( 'ti_header_contact_telephone','(+4) 0746.000.111' ) ) . '</a>';
				}
				?>
			</span>
	</p><!--/.call-for-action-->

</div>
<!--/header-top-->

<nav>

	<div class="navigation-menu">

		<div class="openresponsivemenu">

			<a class="menu-icon-mobile"></a>

		</div>
		<!--/.openresponsivemenu-->

		<div class="nav-container">

			<?php

			wp_nav_menu(
				array(
					'theme_location' => 'top-menu',
				)
			);

			?>

		</div>

	</div>
	<!--/.navigation-menu-->

	<ul class="navigation-socials">

			<li><a href="<?php echo esc_url( get_theme_mod( 'ti_header_facebook_link1', 'http://www.facebook.com' ) ); ?>" title="<?php _e( 'Facebook', 'constructzine-lite' ); ?>" class="facebook-icon" target="_blank"></a></li>
			<li><a href="<?php echo esc_url( get_theme_mod( 'ti_header_twitter_link1', 'http://www.twitter.com' ) ); ?>" title="<?php _e( 'Twitter', 'constructzine-lite' ); ?>" class="twitter-icon" target="_blank"></a></li>
			<li><a href="<?php echo esc_url( get_theme_mod( 'ti_header_youtube_link1', 'http://www.youtube.com' ) ); ?>" title="<?php _e( 'YouTube', 'constructzine-lite' ); ?>" class="youtube-icon" target="_blank"></a></li>

	</ul>
	<!--/.navigation-socials-->

</nav>
<!--/nav-->


</div>

</div>
<!--/layer-->

</header>
