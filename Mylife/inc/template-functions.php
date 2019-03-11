<?php  
/**
 * get avatar for index page

function twenty_get_avatar() {
	$avatar = get_theme_mod( 'tw_blogger_avatar' );
	if(empty( $avatar )) {
		$avatar = get_avatar( get_bloginfo('admin_email'), $size = '128' );
	}else {
		$avatar = '<img src="' . $avatar . '" >';
	}
	return $avatar;
}
 */
function twenty_get_avatar() {
	$avatar = '<img src="./poi.jpg" >';
	return $avatar;
}
/**
 * get blogger name for index page
 */
function twenty_get_blogger_name() {
	$blogger_name = get_theme_mod('tw_blogger_name');
	if(empty( $blogger_name )) {
		$blogger = get_userdata( 1 );
		$blogger_name = $blogger->display_name;
	}
	return $blogger_name;
}
/**
 * get banner image for index page
 */
function twenty_banner_image() {
	$background = get_theme_mod('tw_banner_image');
	if(!empty( $background )) {
		$html = 'style="background-image: url(' . $background . ');" ';
		echo $html;
	}
}
function twenty_favicon() {
	$favicon = get_theme_mod( 'tw_favicon' );
	if( empty($favicon) ) {
		$favicon = IMGURL . '/favicon.ico';
	}
	$html = sprintf('<link id="site-favicon" href="%s" rel="shortcut icon" type="image/x-icon">', $favicon );
	echo $html;
}
add_action( 'wp_head', 'twenty_favicon' );
/**
 * get footer copyright info
 */
function twenty_footer_info() {
	$info = get_theme_mod('tw_footer_info');
	if(empty( $info )) {
		return '&copy; 2014 20theme.';
	}
	return $info;
}
/**
 * get current post-date/time
 */
function twenty_posted_on() {
	$time_string = '<time class="published" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'mylife-theme') )
	);
	return $time_string;
}
/**
 * get current post video
 */
function twenty_post_video( $post_id ) {
	$video_html= get_post_meta( $post_id, 'tw_video', true );
	return $video_html;
}
/**
 * get current post gallery
 */
function twenty_post_gallery( $post_id ) {
	$attachments = get_posts(array(
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_status' => null,
		'post_parent' => $post_id,
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
	));
	$num = count($attachments);
	switch ($num) {
		case '0':
			$html = '';
			break;
		case '1':
			$html = sprintf('<figure class="entry-thumnail">%s</figure>', wp_get_attachment_image($attachments[0]->ID, 'thumbnail'));
			break;
		case '2':
			$html = sprintf('<div class="row">
							<div class="col-6 col-s-6">
								<figure class="entry-thumnail">%1$s</figure>
							</div>
							<div class="col-6 col-s-6">
								<figure class="entry-thumnail">%2$s</figure>
							</div>
							</div>
					', 
					wp_get_attachment_image($attachments[0]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[1]->ID, 'photo-thumb')
					);
			break;
		case '3':
			$html = sprintf('<div class="row">
							<div class="col-6">
								<figure class="entry-thumnail">%1$s</figure>
							</div>
							<div class="col-6">
								<div class="row">
									<div class="col-12 col-s-6">
										<figure class="entry-thumnail">%2$s</figure>
									</div>
									<div class="col-12 col-s-6">
										<figure class="entry-thumnail">%3$s</figure>
									</div>
								</div>
							</div>
							</div>
					', 
					wp_get_attachment_image($attachments[0]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[1]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[2]->ID, 'photo-thumb')
					);
			break;
		case '4':
			$html = sprintf('<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%1$s</figure>
										</div>
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%2$s</figure>
										</div>
									</div>
									<div class="row">
									</div>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%3$s</figure>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%4$s</figure>
										</div>
									</div>
								</div>
							</div>
					', 
					wp_get_attachment_image($attachments[0]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[1]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[2]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[3]->ID, 'photo-thumb')
					);
			break;
		default:
			$html = sprintf('<div class="row">
								<div class="col-6">
									<figure class="entry-thumnail">%1$s</figure>
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%2$s</figure>
										</div>
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%3$s</figure>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%4$s</figure>
										</div>
										<div class="col-6 col-s-6">
											<figure class="entry-thumnail">%5$s</figure>
										</div>
									</div>
								</div>
							</div>
					', 
					wp_get_attachment_image($attachments[0]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[1]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[2]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[3]->ID, 'photo-thumb'),
					wp_get_attachment_image($attachments[4]->ID, 'photo-thumb')
					);
			break;
	}
	$gallery_html = '<div class="gallery-container">' . $html . '</div>';
	return $gallery_html;
}
function twenty_single_featured_content() {
	global $post;
	$post_format = get_post_format();
	switch ($post_format) {
		case 'video':
			$video = get_post_meta($post->ID, '_format_video_embed', true);
			$video = preg_replace('#\<iframe(.*?)\ssrc\=\"(.*?)\"(.*?)\>#i', '<iframe$1 src="$2?wmode=opaque"$3>', $video);
			$video = preg_replace('#\<iframe(.*?)\ssrc\=\"(.*?)\?(.*?)\?(.*?)\"(.*?)\>#i', '<iframe$1 src="$2?$3&$4"$5>', $video);
			if(!empty($video)) {
			?>
  			<div class="video-container">
				<?php echo $video; ?>
  			</div>
			<?php
			}
			break;
		case 'gallery':
			$attachments = get_posts(array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => $post->ID,
				'order' => 'ASC',
				'orderby' => 'menu_order ID',
			));
			$num = count($attachments);
			if( $num <7 && has_post_thumbnail() ) {
				echo '<div class="entry-thumb">' . get_the_post_thumbnail() . '</div>';
			}
			if( $num >= 7 ) {
				printf('<div class="entry-thumb"><div class="row">
							<div class="col-1-5">
								<div class="row">
									<div class="col-12">
										<figure class="entry-thumnail">%1$s</figure>
									</div>
									<div class="col-12">
										<figure class="entry-thumnail">%2$s</figure>
									</div>
								</div>
							</div>
							<div class="col-2-5">
								<figure class="entry-thumnail">%3$s</figure>
							</div>
							<div class="col-1-5">
								<div class="row">
									<div class="col-12">
										<figure class="entry-thumnail">%4$s</figure>
									</div>
									<div class="col-12">
										<figure class="entry-thumnail">%5$s</figure>
									</div>
								</div>
							</div>
							<div class="col-1-5">
								<div class="row">
									<div class="col-12">
										<figure class="entry-thumnail">%6$s</figure>
									</div>
									<div class="col-12">
										<figure class="entry-thumnail">%7$s</figure>
									</div>
								</div>
							</div>
						</div></div>
				',
				wp_get_attachment_image($attachments[0]->ID, 'photo-thumb'),
				wp_get_attachment_image($attachments[1]->ID, 'photo-thumb'),
				wp_get_attachment_image($attachments[2]->ID, 'photo-thumb'),
				wp_get_attachment_image($attachments[3]->ID, 'photo-thumb'),
				wp_get_attachment_image($attachments[4]->ID, 'photo-thumb'),
				wp_get_attachment_image($attachments[5]->ID, 'photo-thumb'),
				wp_get_attachment_image($attachments[6]->ID, 'photo-thumb')
				);
			}
			break;	
		default:
			?>
            <div class="featured-image-container">
            	<?php the_post_thumbnail(); ?>
            </div>
			<?php
			break;
	}
}
/**
 * pagnation
 */
function twenty_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>

	<?php if ( get_next_posts_link() ) : ?>
	<div class="nav-previous"><?php next_posts_link( __( 'LOAD MORE ?', 'twenty' ) ); ?></div>
	<?php endif;
}
/**
 * Post Comments
 * @param  string $comment    
 * @param  string $args     
 * @param  string $depth     
 * @return string           
 */
if ( ! function_exists( 'twenty_comment' ) ) :

function twenty_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<!-- commment -->
    <li>
    	<?php 
          $avatar_size = 48;
        ?>
    	<div class="media comment-body">
    		<a class="pull-left" href="#">
				<?php echo get_avatar($comment,$avatar_size); ?>
			</a>
	    	<div class="media-body">
	    		<div class="comment-author vcard">
					<strong class="media-heading"><?php comment_author(); ?></strong>
					<span class="sep"> / </span>
					<time class="comment-meta commentmetadata"><?php echo get_comment_time(); ?></time>
				</div>
	      		<div class="comment-content">
			    	<?php if ($comment->comment_approved == '0') : ?>
		            <div class="alert alert-info"><?php _e('Your comment is awaiting moderation.','twenty-theme');?></div>
		        	<?php endif; ?>
		          	<?php comment_text(); ?>
				</div>
				<!-- END .comment-content -->
				<div class="reply">
					<?php comment_reply_link(array_merge($args,array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?><span>&darr;</span>
				</div>
				<!-- END .reply -->
	    	</div>
	    	<!-- END .media-body -->
	    </div>
	    <!-- END .comment-body -->
    </li>
    <!-- End commment -->
	<?php
}
endif; // ends check for twenty_comment()
// set the excerpt length
function twenty_excerpt_length(){
	return 40;
}
add_filter( 'excerpt_length', 'twenty_excerpt_length' );
// set the excerpt more text
function twenty_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'twenty_excerpt_more' );

/** Ajax Contact Form **/

add_action('wp_ajax_contact_form_submit',        'twenty_contact_callback');
add_action('wp_ajax_nopriv_contact_form_submit', 'twenty_contact_callback');
function twenty_contact_callback() {
	if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
		$name       = trim(strip_tags($_POST['name']));
		$email      = trim(strip_tags($_POST['email']));
		$subject    = trim(strip_tags($_POST['subject']));
		$message    = trim(htmlentities($_POST['message']));
		$to         = get_bloginfo('admin_email');
		$header     = "From: $email\r\n" .
		"Reply-To: $email\r\n";
		$result = Array(
			'code' => 0,
			'message'=> 'ERROR');

		if(!empty($email) AND !empty($message)){
			if(@mail($to,$subject,$message,$header)){
				$result['code']    = 1;
				$result['message'] = 'SUCCESS';
			}
		} 
	header('content-type: application/json; charset=utf-8');
	echo json_encode($result);
	}
	exit;
}
?>