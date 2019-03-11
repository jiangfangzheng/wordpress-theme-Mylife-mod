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
				<div class="video-container">
					<?php  
					$video = get_post_meta($post->ID, '_format_video_embed', true);
					$video = preg_replace('#\<iframe(.*?)\ssrc\=\"(.*?)\"(.*?)\>#i', '<iframe$1 src="$2?wmode=opaque"$3>', $video);
					$video = preg_replace('#\<iframe(.*?)\ssrc\=\"(.*?)\?(.*?)\?(.*?)\"(.*?)\>#i', '<iframe$1 src="$2?$3&$4"$5>', $video);
					if(!empty($video)) {
						echo $video;
					}
					?>
				</div>
			</div>
			<!-- END .entry-featured -->
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<!-- END .entry-header -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
		<!-- END .entry-summanry -->
	</article>
</li>