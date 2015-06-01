<?php
/* --------------------------------------------------------------------------

	A FaveThemes Framework - Copyright (c) 2014
	Please be extremely cautions editing this file!

    - Functions - Waqas 1.0.0

 ---------------------------------------------------------------------------*/

global $fave_option;

/* Content Width */
if ( ! isset( $content_width ) ) $content_width = 1050; /* pixels */

/* --------------------------------------------------------------------------
 * [default theme contstans]
 ---------------------------------------------------------------------------*/
define('FAVE_PATH', get_template_directory());
define('FAVE_URL', get_template_directory_uri());
define('FAVE_JS', get_template_directory_uri()  . '/js');
define('FAVE_CSS', get_template_directory_uri()  . '/css');
define( 'FAVE_TEXT_DOMAIN', 'favethemes');


/* --------------------------------------------------------------------------
 * [fave_theme_setup - Setup, important theme feature ]
 ---------------------------------------------------------------------------*/
if ( !function_exists( 'fave_theme_setup' ) ) {
    function fave_theme_setup() {
        
        /* Load Theme Text Domain */
    	load_theme_textdomain( 'favethemes', get_template_directory() . '/languages' );
        	
        /* This theme uses wp_nav_menu() in one locations. */
		register_nav_menus( array(
			'main_menu' => __( 'Main Menu', 'favethemes' ), // Main site menu
			'secondary_menu' => __( 'Secondary Menu', 'favethemes' ) // Main site menu
		) );
   	
    	/* This theme styles the visual editor to resemble the theme style */
		add_editor_style( array( 'css/editor-style.css', fave_font_url() ) );
	
		/* Enable support for Post Thumbnails, and declare sizes */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 600, 600, true );
		add_image_size( 'home-layout-1', 595, 375, true);
		add_image_size( 'home-layout-2', 720, 380, true);
		add_image_size( 'home-layout-4', 685, 425, true);
		add_image_size( 'home-layout-5', 720, 999);
		add_image_size( 'menu-thumb', 286, 192, true);
		add_image_size( 'search-img', 410, 410, true);
		add_image_size( 'img-8080', 80, 80, true);
		
		add_image_size( 'grid-1-img-1', 720, 350, true);
		add_image_size( 'grid-1-img-2', 450, 438, true);
		add_image_size( 'slider-grid-3', 835, 539, true);
		add_image_size( 'img-grid-3', 450, 291, true);
		
		add_image_size( 'standard-large', 1250, 600, true );		// Large Blog Image
		
		
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'video','gallery','audio','link','quote'
		) );
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list',
		) );

        /* Setup WP feed links */
        add_theme_support( 'automatic-feed-links' );
		
		/* This theme uses its own gallery styles */
		add_filter( 'use_default_gallery_style', '__return_false' );       
    	
    }
}
add_action( 'after_setup_theme', 'fave_theme_setup' );

/* --------------------------------------------------------------------------
 * [ Register Lato Google font for theme. ]
 ---------------------------------------------------------------------------*/
if( !function_exists( 'fave_font_url' ) ) {
	
	function fave_font_url() {
		$font_url = '';
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Lato, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Lato font: on or off', 'favethemes' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
		}
	
		return $font_url;
	}
}

/* --------------------------------------------------------------------------
 * [ fave_excerpt_length - Set WP excerpt length via excerpt_length filter]
 ---------------------------------------------------------------------------*/
if( !function_exists( 'fave_excerpt_length' ) ) {
	function fave_excerpt_length($length) {
		global $fave_option;
	    return $fave_option['site_wide_excerpt_length'];
	}
}
add_filter('excerpt_length', 'fave_excerpt_length');


/* --------------------------------------------------------------------------
 * [ fave_excerpt_more - Set article read more string via wp_trim_excerpt]
 ---------------------------------------------------------------------------*/
if( !function_exists( 'fave_excerpt_more' ) ) {
	function fave_excerpt_more($excerpt) {
	    return '<p><a class="continue-reading" href="'.esc_url( get_permalink() ).'">'.__('Continue reading...', 'favethemes').'</a></p>';
	}
}
add_filter('excerpt_more', 'fave_excerpt_more');


/* --------------------------------------------------------------------------
 * [ Search filter ]
 ---------------------------------------------------------------------------*/
if( !function_exists( 'fave_exclude_in_search' ) ) {
    function fave_exclude_in_search($query) {
		
		global $fave_option;
		
        if ( ! is_admin() ) {
            if( $query->is_search ) {
                $query->set('post_type', array('post'));
            }
        }
    return $query;
    }
}
add_filter('pre_get_posts','fave_exclude_in_search');


/* -------------------------------------------------------------------------
 * [ fave_browser_body_class - Set different class for browers ]
 --------------------------------------------------------------------------*/

if( !function_exists( 'fave_browser_body_class' ) ) {
	function fave_browser_body_class($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if ($is_lynx) { $classes[] = 'lynx'; }
		elseif ($is_gecko) { $classes[] = 'gecko'; }
		elseif ($is_opera) { $classes[] = 'opera'; }
		elseif ($is_NS4) { $classes[] = 'ns4'; }
		elseif ($is_safari) { $classes[] = 'safari'; }
		elseif ($is_chrome) { $classes[] = 'chrome'; }
		elseif ($is_IE) { $classes[] = 'ie'; }
		else { $classes[] = 'unknown'; }
	
		if ($is_iphone) { $classes[] = 'iphone'; }
			
		$classes[] = 'fave-body';
			
		return $classes;
	}
}
add_filter('body_class', 'fave_browser_body_class');


/* -------------------------------------------------------------------------
 * [ fave_wp_title -  ]
 --------------------------------------------------------------------------*/

if( !function_exists( 'fave_wp_title' ) ) {
	/**
	 * Create a nicely formatted and more specific title element text for output
	 * in head of document, based on current view.
	 *
	 * @since UnPress 1.0
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function fave_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() ) {
			return $title;
		}
	
		// Add the site name.
		$title .= get_bloginfo( 'name' );
	
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}
	
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Page %s', 'favethemes' ), max( $paged, $page ) );
		}
	
		return $title;
	}
}
add_filter( 'wp_title', 'fave_wp_title', 10, 2 );

/* -------------------------------------------------------------------------
 * [ theme_init - AUTHOR PROFILE ]
 --------------------------------------------------------------------------*/
if ( ! function_exists( 'fave_author_info' ) ) :
/**
 * Adds user custom fields
 *
 * @since mokka 1.0
 */
function fave_author_info( $contactmethods ) {
	
	$contactmethods['fave_author_tagline']		= __( 'Tagline', 'favethemes' );
	$contactmethods['fave_author_facebook']		= __( 'Facebook', 'favethemes' );
	$contactmethods['fave_author_linkedin']		= __( 'LinkedIn', 'favethemes' );
	$contactmethods['fave_author_twitter']		= __( 'Twitter', 'favethemes' );
	$contactmethods['fave_author_google_plus']	= __( 'Google Plus', 'favethemes' );
	$contactmethods['fave_author_youtube']		= __( 'Youtube', 'favethemes' );
	$contactmethods['fave_author_flickr']		= __( 'Flickr', 'favethemes' );
	$contactmethods['fave_author_pinterest']		= __( 'Pinterest', 'favethemes' );
	$contactmethods['fave_author_foursquare']	= __( 'FourSquare', 'favethemes' );
	$contactmethods['fave_author_instagram']		= __( 'Instagram', 'favethemes' );
	$contactmethods['fave_author_vimeo']			= __( 'Vimeo', 'favethemes' );
	$contactmethods['fave_author_tumblr']		= __( 'Tumblr', 'favethemes' );
	$contactmethods['fave_author_dribbble']		= __( 'Dribbble', 'favethemes' );
		
	return $contactmethods;
}
endif; // add_agent_contact_info
add_filter( 'user_contactmethods', 'fave_author_info', 10, 1 );

/* -------------------------------------------------------------------------
 * [ main_menu_bullet -  ]
 --------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_items', 'main_menu_bullet', 10, 2 );
function main_menu_bullet ( $items, $args ) {
    if ($args->theme_location == 'main_menu') {
        $items .= '<li class="nav-icon"><i class="fa fa-circle"></i></li>';
    }
    return $items;
}

/* -------------------------------------------------------------------------
 * [ Sticky Nav Logo -  ]
 --------------------------------------------------------------------------*/
//add_filter( 'wp_nav_menu_items', 'fav_sticky_nav_logo', 10, 2 );
//function fav_sticky_nav_logo ( $items, $args ) {
//	global $fave_option;
//	
//	if ($args->theme_location == 'main_menu') {
//		$sticky_logo ='';
//		$sticky_logo .= '<div class="navbar-header mokka-menu-additional-logo animated"><a class="navbar-brand" href="'.site_url().'"><img src="'.$fave_option['sticky_nav_logo'].'"></a></div>';
//		
//		$items = $sticky_logo . $items;
//	}
//	return $items;
//}

/* -------------------------------------------------------------------------
 * [ mokka_custom_avatar -  Default avatar for comments ]
 --------------------------------------------------------------------------*/
if(!function_exists('mokka_custom_avatar')){
	function mokka_custom_avatar($avatar_defaults){
		$new_default_icon = FAVE_URL . '/images/default-avatar.png';
		$avatar_defaults[$new_default_icon] = 'Favethemes Avatar';
		return $avatar_defaults;
	}
add_filter('avatar_defaults','mokka_custom_avatar');
}

/* -------------------------------------------------------------------------
 * [ mokka_custom_avatar -  Default avatar for comments ]
 --------------------------------------------------------------------------*/
if(!function_exists('mokka_filter_gettext')){
	function mokka_filter_gettext( $translation, $text, $domain ) {
		if ( $text == 'Default Template' ) {
			return __( 'Full Width Page', 'favethemes' );
		}
		return $translation;
	}
add_filter( 'gettext', 'mokka_filter_gettext', 10, 3 );    
}
/* -------------------------------------------------------------------------
 * [ theme_init - Initialize theme Options, Meta-box, Widgets, etc... ]
 --------------------------------------------------------------------------*/
require_once (FAVE_PATH . '/includes/fave-init.php');