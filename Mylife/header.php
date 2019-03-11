<?php  
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Mylife
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<title><?php wp_title( '-', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="search-area"> 
			<form class="search" action="<?php echo home_url('/'); ?>">
                <input type="text" class="s" name="s" placeholder="回车以搜索..">
                <input type="submit" class="submit" value="">
                <i class="fa fa-search"></i>
			</form>
		</div>
		<!-- END .search-area -->
		<div class="site-branding">
			<hgroup>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
		</div>
		<!-- END .site-branding -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a href="#" id="trigger-overlay"><i class="fa fa-bars"></i></a>
			<?php  
			wp_nav_menu( array(
				'theme_location'  => 'primary',
				'container'       => false, 
				'menu_class'      => 'nav-menu' ) );
			?>
		</nav>
		<!-- END .main-navigation -->
	</header>
	<!-- END .site-header -->