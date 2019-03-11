<?php
/**
 * Template Name: Gallery
 * The Template for displaying all single posts.
 *
 * @package Mylife
 */
get_header(); 
global $post,$paged;
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 2,
	'tax_query' => array(
		array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-gallery' )
		)
	)
);
$page_num = 1;
if($paged>0){
     $page_num =  $paged;
}else{
	if(get_query_var('paged')) {
		$page_num  = $paged = get_query_var( 'paged');
	}elseif(get_query_var( 'page')) {
		$page_num  = $paged = get_query_var( 'page');
	}else {
		$page_num  = $paged = 1;
	}
}
// try get page if page <=1
if($page_num<=1){
    $page_num = $paged = 1;
}
if($page_num<=0){
 $page_num = 1;
}
$args['paged'] =  $page_num;
$wp_query = new WP_Query( $args );
//var_dump($attachments);
?>

<div id="gallery" class="site-content">
	<div id="primary" class="content-area clearfix">
		<main id="main" class="site-main" role="main">
			<?php if($wp_query->have_posts()) : ?>
			<div class="photo-grid clearfix">
			<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<?php
				$attachments = get_children(array(
					'post_parent' => $post->ID,
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'post_status' => 'inherit',
					'order' => 'ASC',
					'orderby' => 'menu_order'
				));
				?>
				<?php if($attachments): ?>
					<?php foreach ($attachments as $attachment) { ?>
					<div class= "photo col-3 col-m-4 col-s-6">
						<figure class="entry-thumb">
							<?php echo wp_get_attachment_image($attachment->ID, 'photo-thumb'); ?>
							<figcaption class="entry-thumb-caption">
								<div class="caption-content">
									<span class="entry-date">
									<?php
										$time_string = '<time class="published" datetime="%1$s">%2$s</time>';
										$time = $attachment->post_date;
										$time_string = sprintf( $time_string,
											esc_attr( mysql2date('c', $attachment->post_date) ),
											esc_html( human_time_diff(mysql2date('U', $attachment->post_date), current_time('timestamp')) . __(' ago', 'mylife-theme') )
										);
										echo $time_string;
									?>
									</span>
									<h4 class="photo-title"><?php the_title(); ?></h4>
									<span class="link">
										<a href="<?php echo wp_get_attachment_url($attachment->ID); ?>" data-lightbox="roadtrip" title="<?php echo $attachment->post_title; ?>"><?php _e( 'view photo &rarr;', 'twenty-theme' ); ?></a>
									</span>
								</div>
							</figcaption>
						</figure>
					</div>
					<!-- END .col-3 col-m-4 col-s-6 -->
					<?php } ?>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>
			<!-- END .photo-grid -->
			<div class="infinite-loader"></div>
			<div class="pagination clearfix">
				<?php twenty_paging_nav(); ?>
			</div>
			<?php endif; ?>
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>