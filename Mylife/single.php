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
				<header class="entry-header">
					<div class="featured-area">
						<?php twenty_single_featured_content(); ?>
					</div>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-meta">
						<span class="date-title">
							<?php the_time('Y-m-d') ?>
						</span>
					</div>
				</header>
				<div class="entry-content post-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array(
							'before' =>  '<div class="post-pagination"><span>' . __( 'Pages:' ) . '</span>',
							'after'  => '</div>'
							)
					); ?> 
				</div>
				<footer class="entry-footer clearfix">
					<div class="tagcloud">
						<?php the_tags( '', '', '' ); ?>
					</div>
				</footer>
			</article>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>