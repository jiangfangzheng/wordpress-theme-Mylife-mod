<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Mylife
 */
get_header();the_post(); ?>
<div id="blog_single" class="site-content">
	<div id="primary" class="content-area clearfix">
		<main id="main" class="site-main" role="main">
			<article <?php post_class('single'); ?>>
				<div class="entry-content post-content">
					<a href="http://" target="_blank">404</a>
				</div>
			</article>
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->
</div>
<!-- END .site-content -->
<?php get_footer(); ?>