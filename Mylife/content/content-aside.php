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
					<?php the_time('Y-m-d') ?>
				</span>
			</div>
			<!-- END .entry-meta -->
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<!-- END .entry-header -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
		<!-- END .entry-summanry -->
	</article>
</li>