<?php
/**
 * The search results template file.
 *
 * @package Mylife
 */

get_header(); ?>

<div id="blog" class="site-content">
	<div class="banner-area">
		<div class="banner-content">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twenty-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</div>
		<!-- END .banner-content -->
		<div class="full-bg"></div>
	</div>
	<!-- END .banner-area -->
	<div id="primary" class="content-area clearfix">
		<main id="main" class="site-main" role="main">
			<?php  
				if(have_posts()) :
			?>
			<ul id="timeline" class="clearfix">
			<?php  
				while(have_posts()) : the_post();

					get_template_part( 'content/content', get_post_format() );

				endwhile;
			?>
			</ul>
			<div class="infinite-loader"></div>
			<div class="pagination clearfix">
				<?php twenty_paging_nav(); ?>
			</div>
			<?php else: 

					get_template_part( 'content/content', 'none' );

				endif;
			?>
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>