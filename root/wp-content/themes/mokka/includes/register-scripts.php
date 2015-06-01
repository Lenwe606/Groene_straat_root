<?php
/**
 * Register jQuery scripts and 
 * CSS Styles only for the front-end
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/

function fave_theme_scripts(){	
	global $fave_option;
	/**
	 * Register CSS styles
	 */

	 wp_register_style( 'fave-bootstrap.min', FAVE_CSS. '/bootstrap.min.css', array(), '1', 'all' );
	 wp_register_style( 'fave-font-awesome.min', FAVE_CSS. '/font-awesome.min.css', array(), '1', 'all' );
	 wp_register_style( 'fave-icons', FAVE_CSS. '/icons.css', array(), '1', 'all' );
	 wp_register_style( 'fave-justifiedGallery.min', FAVE_CSS. '/justifiedGallery.min.css', array(), '3.2.0', 'all' );
	 wp_register_style( 'fave-slide_menu', FAVE_CSS. '/slide_menu.css', array(), '1', 'all' );
	 wp_register_style( 'fave-ilightbox', FAVE_CSS. '/ilightbox.css', array(), '1', 'all' );
	 wp_register_style( 'fave-headhesive', FAVE_CSS. '/headhesive.css', array(), '1', 'all' );
	 
	 wp_register_style( 'fave-owl.carousel', get_template_directory_uri(). '/css/owl.carousel.css', array(), '1.3.3', 'all' );
	 wp_register_style( 'fave-media_queries', FAVE_CSS. '/media-queries.css', array(), '1', 'all' );
	 
	 wp_enqueue_style( 'fave-bootstrap.min' );
	 wp_enqueue_style( 'fave-font-awesome.min' );
	 wp_enqueue_style( 'fave-icons' );
	 wp_enqueue_style( 'fave-justifiedGallery.min' );
	 wp_enqueue_style( 'fave-slide_menu' );
	 wp_enqueue_style( 'fave-ilightbox' );
	 wp_enqueue_style( 'fave-headhesive' );
	 
	 wp_enqueue_style( 'fave-owl.carousel' );
	 wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1', 'all' );
	 wp_enqueue_style( 'fave-media_queries' );
	 
	
	 wp_enqueue_script( 'jquery', false, array(), false, true);
     wp_enqueue_script( 'fave-bootstrap.min', FAVE_JS.'/bootstrap.min.js', 'jquery', '1', true );
	 
	 wp_enqueue_script( 'fave-jquery.mousewheel.min', FAVE_JS.'/jquery.mousewheel.min.js', 'jquery', '3.0.6', true );
	 wp_enqueue_script( 'fave-jquery.touchSwipe.min', FAVE_JS.'//jquery.touchSwipe.min.js', 'jquery', '1.3.3', true );
	 wp_enqueue_script( 'fave-jquery.transit.min', FAVE_JS.'/jquery.transit.min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-jquery.ba-throttle-debounce.min', FAVE_JS.'/jquery.ba-throttle-debounce.min.js', 'jquery', '1.1', true );
	 
	 wp_enqueue_script( 'fave-masonry.pkgd.min', FAVE_JS.'/masonry.pkgd.min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-imagesloaded', FAVE_JS.'/imagesloaded.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-plugins', FAVE_JS.'/plugins.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-ilightbox.packed', FAVE_JS.'/ilightbox.packed.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-owl.carousel.min', FAVE_JS . '/owl.carousel.min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-jquery.sticky', FAVE_JS . '/headhesive.min.js', 'jquery', '1', true );
	 wp_enqueue_script( 'fave-custom', FAVE_JS.'/custom.js', 'jquery', '1', true );
	
	 
	 if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	 }
	
}

if(!is_admin()){
	add_action( 'wp_enqueue_scripts', 'fave_theme_scripts' );
}

if (is_admin() ){
	function favethemes_admin_scripts(){	
		wp_register_script('favemetajs', get_template_directory_uri() .'/js/admin/init.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('favemetajs');
	}
}

add_action('admin_enqueue_scripts', 'favethemes_admin_scripts');

// Header custom JS
function fave_header_scripts(){
	global $fave_option;
	
	if ( isset($fave_option['custom_js_header']) != '' ){
		echo '<script type="text/javascript">'."\n",
				$fave_option['custom_js_header']."\n",
			 '</script>'."\n";
	}
}
if(!is_admin()){
	add_action('wp_head', 'fave_header_scripts');
}

// Footer custom JS
function fave_footer_scripts(){
	global $fave_option;
	
	if ( isset($fave_option['custom_js_footer']) != '' ){
		echo '<script type="text/javascript">'."\n",
				$fave_option['custom_js_footer']."\n",
			 '</script>'."\n";
	}
}
if(!is_admin()){
	add_action( 'wp_footer', 'fave_footer_scripts', 100 );
}