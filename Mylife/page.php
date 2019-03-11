<?php
/**
 * The single page template.
 *
 * @package Mylife
 */
get_header(); the_post();

?>

<div id="contact" class="site-content">
	<div class="banner-area">
		<div class="banner-content">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
		<!-- END .banner-content -->
		<div class="full-bg"></div>
	</div>
	<!-- END .banner-area -->
	<div id="primary" class="content-area clearfix">
		<main id="main" class="site-main post-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class('page mt30 clearfix'); ?>>
				<?php the_content(); ?>
			</article>
			<!-- END .archive-box -->
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>