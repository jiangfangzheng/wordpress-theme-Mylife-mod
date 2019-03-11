<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mylife
 */

get_header(); ?>

<div id="blog" class="site-content">
	<div class="banner-area" <?php twenty_banner_image(); ?>>
		<div class="banner-content">
			<div class="avatar-container">
				<?php echo twenty_get_avatar(); ?>
			</div>
			<div class="info">
				<?php  
					$writer = get_userdata( 1 );
				?>
				<span class="writer-name"><?php echo twenty_get_blogger_name(); ?></span>
			</div>
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

					get_template_part( 'content', 'none' );

				endif;
			?>
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>