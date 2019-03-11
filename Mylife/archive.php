<?php
/**
 * The search results template file.
 *
 * @package Mylife
 */

get_header(); ?>

<div id="blog" class="site-content">
	<div class="banner-area">
		<div class="banner-content">
			<h1 class="page-title">
			<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					printf( __( 'Author: %s', 'twenty-theme' ), '<span class="vcard">' . get_the_author() . '</span>' );

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'twenty-theme' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'twenty-theme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twenty-theme' ) ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'twenty-theme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twenty-theme' ) ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'twenty-theme' );

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					_e( 'Galleries', 'twenty-theme');

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'twenty-theme');

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'twenty-theme' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'twenty-theme' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'twenty-theme' );

				elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
					_e( 'Statuses', 'twenty-theme' );

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					_e( 'Audios', 'twenty-theme' );

				elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
					_e( 'Chats', 'twenty-theme' );

				else :
					_e( 'Archives', 'twenty-theme' );

				endif;
			?>
			</h1>
		</div>
		<!-- END .banner-content -->
		<div class="full-bg"></div>
	</div>
	<!-- END .banner-area -->
	<div id="primary" class="content-area clearfix">
		<main id="main" class="site-main" role="main">
			<?php  
				if(have_posts()) :
			?>
			<ul id="timeline" class="clearfix">
			<?php  
				while(have_posts()) : the_post();

					get_template_part( 'content/content', get_post_format() );

				endwhile;
			?>
			</ul>
			<div class="infinite-loader"></div>
			<div class="pagination clearfix">
				<?php twenty_paging_nav(); ?>
			</div>
			<?php else: 

					get_template_part( 'content', 'none' );

				endif;
			?>
		</main>
		<!-- END site-main -->
	</div>
	<!-- END #primary -->

</div>
<!-- END .site-content -->
<?php get_footer(); ?>