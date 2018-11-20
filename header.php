<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package santaconstanza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="#page-top">
			<img src="<?php echo wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ) , 'full' ); ?>"  style="height: 6vh;" class="img-fluid is-normal">

			<img src="http://localhost/santaconstanza/wp-content/uploads/2018/11/logo_hover.svg"  style="height: 6vh;" class="img-fluid is-hover d-none">
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#primary-menu-wrap" aria-controls="primary-menu-wrap" aria-expanded="false" aria-label="Toggle navigation">
		Menu
		<i class="fas fa-bars"></i>
		</button>
		<?php
				wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'menu_id'         => 'navbarResponsive',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'primary-menu-wrap',
					'menu_class'      => 'navbar-nav text-uppercase ml-auto',
					'fallback_cb'     => '__return_false',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 2,
					'walker'          => new WP_bootstrap_4_walker_nav_menu()
			) );
			?>
	</div>
</nav>
<!-- Header -->

<div id="page" class="site">

			<div id="content" class="site-content">
