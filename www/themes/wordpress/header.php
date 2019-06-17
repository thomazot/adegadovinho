<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplessystem
 */
$colorOne = get_theme_mod('colors_primary');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="Description" content="<?php get_bloginfo( 'description', 'display' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="<?php echo $colorOne; ?>">

    <link rel="profile" href="//gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="wrapper">
	<div class="wrapper__container">
		<header id="header" class="header">
			<div class="header__container">
				<button aria-label="Abrir e Fechar menu" role="button" class="header__menu-open" aria-controls="header__menu"><i class="fas fa-bars"></i></button>
				
				<div class="header__logo">
					<?php zotLogo() ?>
				</div>

				<div class="header__social">
					<div class="social">
						<?php include "social.php"; ?>
					</div>
				</div>

				<div id="header-search" class="header__search" aria-hidden="true" >
					<button aria-label="Abrir Busca" aria-controls="header-search" type="button" class="header__search-button"><i class="fas fa-search"></i></button>
					<div class="header__search-container">
						<button aria-label="Fechar Busca" class="header__search-close" aria-controls="header-search"><i class="fas fa-times"></i></button>
						
						<form id="search-form" class="search-form" method="get" action="<?php echo home_url('/'); ?>">
							<input type="text" class="search-form__input" name="s" placeholder="Busque por um ou mais produtos" value="<?php the_search_query(); ?>">
							<button class="search-form__button ct-bg-primary" type="submit">Buscar</button>
						</form>
					</div>
				</div>

				<div class="header__cart">
					<a href="<?php echo get_theme_mod('cart') ?>" target="_blank"><svg width="27" height="20px" ><use xlink:href="#icon-cart" /></svg></a>
				</div>

				<nav id="header__menu" class="header__menu">
					<button aria-label="Abrir e Fechar menu" role="button" class="header__menu-wrapper" aria-controls="header__menu"></button>
					<div class="header__menu-container">
						<button aria-label="Fechar Menu" class="header__menu-close" aria-controls="header__menu"><i class="fas fa-times"></i></button>
						<?php zotMenu(); ?>
					</div>
				</nav>
			</div>
		</header>
		
		<?php if ( is_home() ) { zotBanner(); } ?>

		<div id="content" class="content">
			<div class="content__container">
