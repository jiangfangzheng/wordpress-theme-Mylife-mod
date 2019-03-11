<?php 
function twenty_sc_highlight( $atts, $content='' ) {
	return '<span class="highlight">' . $content . '</span>';
}
add_shortcode( 'highlight', 'twenty_sc_highlight' );
?>