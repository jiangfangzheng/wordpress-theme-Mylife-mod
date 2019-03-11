<?php  
/**
 * @package Mylife
 */
?>
<li>
	<article <?php post_class( 'clearfix' ); ?>>
		<header class="entry-header">
			<div class="entry-meta">
				<span class="entry-date">
					<?php echo twenty_posted_on(); ?>
				</span>
			</div>
			<!-- END .entry-meta -->
			<div class="entry-featured">
				<div class="gallery-container">
					<?php echo twenty_post_gallery($post->ID); ?>
				</div>
			</div>
			<!-- END .entry-featured -->
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<!-- END .entry-header -->
	</article>
</li>