<?php
/**
 * The footer for our theme.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mylife
 */
?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php echo twenty_footer_info(); ?>
		</div>
	</footer><!-- #colophon -->
	<div class="overlay overlay-scale">
		<button type="button" class="overlay-close">Close</button>
		<nav>
			<?php wp_nav_menu( array(
				'theme_location'  => 'primary',
				'container'       => false, 
				'menu_class'      => '') );
			?>
		</nav>
	</div>
	<a href="#" class="site-scroll-top"><i class="fa fa-arrow-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>