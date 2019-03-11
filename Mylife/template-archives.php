<?php
/**
 * Template Name: Archives
 * The Template for displaying archives.
 *
 * @package Mylife
 */
get_header(); the_post();
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 1000,
);
$the_query = new WP_Query( $args );

?>

<div id="archives" class="site-content">
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
			<article id="post-<?php the_ID(); ?>" <?php post_class('mt30 clearfix'); ?>>
				<?php the_content(); ?>
			</article>
			<div class="archive-latest archive-box">
				<section class="col-4 archive-section">
					<h4><?php _e('ARCHIVE BY MONTH','twenty-theme'); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
					<!--<h4><?php _e('ARCHIVE BY YEAR','twenty-theme'); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'yearly' ) ); ?>
					</ul>-->
				</section>
				<!-- END .archive-section -->
				<section class="col-4 archive-section">
					<h4><?php _e('LATEST 1000 POSTS','twenty-theme'); ?></h4>
					<?php if($the_query->have_posts()): ?>
					<ul class="posts-archive">
						<?php while($the_query->have_posts()): $the_query->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</section>
				<!-- END .archive-section -->
				<section class="col-4 archive-section">
					<h4><?php _e('CATEGORIES','twenty-theme'); ?></h4>
					<ul>
						<?php 
							$args = array (
								'orderby' => 'name',
								'title_li' => ''
							);
							wp_list_categories($args); 
						?> 
					</ul>
					<!--<h4><?php _e('TAGS','twenty-theme'); ?></h4>
					<?php
						$tags = get_tags();
						$html = '<ul>';
						foreach ( $tags as $tag ) {
							$tag_link = get_tag_link( $tag->term_id );
									
							$html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
							$html .= "{$tag->name}</a></li>";
						}
						$html .= '</ul>';
						echo $html;
					?>-->
					<h4><?php _e('ARCHIVE BY YEAR','twenty-theme'); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'yearly' ) ); ?>
					</ul>
				</section>
				<!-- END .archive-section -->
			</div>
			<!-- END .archive-box -->
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>