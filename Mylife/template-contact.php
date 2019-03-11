<?php
/**
 * Template Name: Contact
 * The Template for contact.
 *
 * @package Mylife
 */
get_header(); the_post();

?>

<div id="contact" class="site-content">
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
				<form action="" id="contact-form" method="post">
					<p>
						 <input type="text" placeholder="Name" required name="name" id="name" class="form-width-medium"/>
					</p>
					<p>
						 <input type="email" placeholder="Email Adress" name="email" id="email" value="" class="form-width-medium" />
					</p>
					<p>
						 <input type="text" placeholder="Subject" name="subject" id="subject" value="" class="form-width-large" />
					</p>
					<p>
						<textarea placeholder="Mesage.." required name="message" id="message" rows="10" class="form-width-large"></textarea>
					</p>
					<div class="info">
						<span class="loading-img"></span>
						<div class="end-info"></div>
					</div>
					<input type="hidden" name="submitted" id="submitted" value="true" />
					<input type="hidden" name="action" value="contact_form_submit"/>
                	<input type="submit" value="SEND" class="submit_form button button-primary button-large" />
				</form>
			</div>
			<!-- END .archive-box -->
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>