<?php  
/**
 * @package Mylife
 */
$quote_author = get_post_meta($post->ID, '_format_quote_source_name', true);
$quote_author_link = get_post_meta($post->ID, '_format_quote_source_url', true);
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
				<div class="quote-container">
					<h2 class="quote-text"><?php echo get_the_content(); ?></h2>
					<div class="quote-author">
						<a href="<?php echo $quote_author_link; ?>" target="_blank">
							<cite><?php echo '-'.$quote_author; ?></cite>
						</a>
					</div>
				</div>
			</div>
			<!-- END .entry-featured -->
		</header>
		<!-- END .entry-header -->
	</article>
</li>