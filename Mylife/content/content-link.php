<?php  
/**
 * @package Mylife
 */
$link = get_post_meta($post->ID, '_format_link_url', true);
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
				<div class="link-container">
					<h2 class="entry-title"><a href="<?php echo $link; ?>" target="_blank"><?php the_title(); ?></a></h2>
				</div>
			</div>
			<!-- END .entry-featured -->
		</header>
		<!-- END .entry-header -->
	</article>
</li>