<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twenty_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Mylife
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'One Comment', '%1$s Comments.', get_comments_number(), 'comments title', 'twenty-theme' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use twenty_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define twenty_comment() and that will be used instead.
				 * See twenty_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'twenty_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation clearfix" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twenty-theme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twenty-theme' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twenty-theme' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$args = array(
			'title_reply' => __( 'Reply', 'twenty-theme' ),
			'comment_notes_before' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Comment" rows="2" aria-required="true"></textarea></p>',
			'comment_notes_after' => '',
			'comment_field' => '',
			'must_log_in' => '<p class="must-log-in alert">' .  sprintf( __( 'You must  <a href="%s">Login in</a> before you submit a comment.', 'twenty-theme' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'logged_in_as' => ''
	
			. '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Comment" rows="2" aria-required="true"></textarea></p>',
			'label_submit' => __( 'Submit', 'twenty-theme' ),
			'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author">' . '<input id="author" name="author" placeholder="Name *" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><i class="icon-user"></i></p>',
			'email' => '<p class="comment-form-email">' . '<input id="email" name="email" placeholder="Email *" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><i class="icon-envelope"></i></p>',
			'url' => '<p class="comment-form-url">' . '<input id="url" name="url" placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><i class="icon-link"></i></p>' ) )
		); 
		comment_form($args); 
	?>

</div><!-- #comments -->