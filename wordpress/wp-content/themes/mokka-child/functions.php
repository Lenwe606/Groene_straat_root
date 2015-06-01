<?php
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

remove_action('wp_head', 'wp_generator');

add_post_type_support( 'page', 'excerpt' );

load_theme_textdomain( 'favethemes', get_stylesheet_directory() . '/languages' );

// *** Use get_stylesheet_directory instead of get_template_directory
$locale = get_locale();
$locale_file = get_stylesheet_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

add_action('wp_head','hook_javascript');

function hook_javascript() {
	$output= '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=fiveseasons" async="async"></script>
';
	// echo $output;
}

function my_body_hook() {
    do_action( 'my_body_hook' );
}

add_action( 'my_body_hook', 'add_analytics' );
function add_analytics() {
	// Nothing here
}

if (is_page_template('tpl-signup.php')) {
	// https://developers.google.com/recaptcha/
	// require_once('recaptchalib.php');
}

// Remove dashboard meta
function remove_dashboard_meta() {
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_meta' );

// Hide update nag
function wps_hide_update_notice() { 
	if ( !current_user_can( 'manage_options' ) ) { 
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action('admin_menu','wps_hide_update_notice');

function site_content_init() {
	// Make sure to click Settings/Permalinks after changes to this function to flush rewrite rules

	add_action( 'init', 'create_regio_taxonomies' );
	
	function create_regio_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
		'name' => _x('Regio&#39;s', 'regtax', 'mokka'),
		'singular_name' => _x('regio', 'regtax', 'mokka'),
		'search_items' =>  _x('Regio zoeken', 'regtax', 'mokka'),
		'all_items' => _x('Alle regio&#39;s', 'regtax', 'mokka'),
		'parent_item' => _x('Ouder', 'regtax', 'mokka'),
		'parent_item_colon' => _x('Ouder:', 'regtax', 'mokka'),
		'edit_item' => _x('Regio bewerken', 'regtax', 'mokka'),
		'update_item' => _x('Regio opslaan', 'regtax', 'mokka'),
		'add_new_item' => _x('Nieuwe regio', 'regtax', 'mokka'),
		'new_item_name' => _x('Naam nieuwe regio', 'regtax', 'mokka'),
		'parent_item' => _x('Ouder', 'regtax', 'mokka'),
		'parent_item_colon' => _x('Ouder:', 'regtax', 'mokka'),
		'search_items' =>  _x('Regio zoeken', 'regtax', 'mokka'),
		'edit_item' => _x('Regio bewerken', 'regtax', 'mokka'),
		'update_item' => _x('Regio opslaan', 'regtax', 'mokka')
		); 	

		register_taxonomy('regio',array('post'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => _x('regio', 'slug', 'groenestraat') )
		));

		register_taxonomy_for_object_type('regio', 'post');
	}

	add_action( 'init', 'create_straat_taxonomies' );
	
	function create_straat_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
		'name' => _x('Straten', 'regtax', 'mokka'),
		'singular_name' => _x('straat', 'regtax', 'mokka'),
		'search_items' =>  _x('Straat zoeken', 'regtax', 'mokka'),
		'all_items' => _x('Alle straten', 'regtax', 'mokka'),
		'parent_item' => _x('Ouder', 'regtax', 'mokka'),
		'parent_item_colon' => _x('Ouder:', 'regtax', 'mokka'),
		'edit_item' => _x('Straat bewerken', 'regtax', 'mokka'),
		'update_item' => _x('Straat opslaan', 'regtax', 'mokka'),
		'add_new_item' => _x('Nieuwe straat', 'regtax', 'mokka'),
		'new_item_name' => _x('Naam nieuwe straat', 'regtax', 'mokka'),
		'parent_item' => _x('Ouder', 'regtax', 'mokka'),
		'parent_item_colon' => _x('Ouder:', 'regtax', 'mokka'),
		'search_items' =>  _x('Straat zoeken', 'regtax', 'mokka'),
		'edit_item' => _x('Straat bewerken', 'regtax', 'mokka'),
		'update_item' => _x('Straat opslaan', 'regtax', 'mokka')
		); 	

		register_taxonomy('straat',array('post'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => _x('straat', 'slug', 'groenestraat') )
		));

		register_taxonomy_for_object_type('straat', 'post');
	}

	// flush_rewrite_rules( false );
}

site_content_init();

function load_front_end_scripts() {
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'cookiebar', get_stylesheet_directory_uri() . '/js/jquery.cookiebar.js');

	wp_enqueue_script( 'addthis', 'https://s7.addthis.com/js/300/addthis_widget.js#pubid=fiveseasons');

	wp_enqueue_style( 'dashicons', get_stylesheet_directory_uri() . '/dashicons.css');

	// Site-wide scripts
	wp_enqueue_script( 'mokka-site', get_stylesheet_directory_uri() . '/js/site.min.js');

	if (is_page_template('tpl-signup.php')) {
		wp_register_script( 'signup-js', get_stylesheet_directory_uri() . '/js/check_signup.min.js');
		$translation_array = array(
			'voornaam' => _x( 'Vul je voornaam in : max. 30 tekens', 'sub', 'favethemes' ),
			'naam' => _x( 'Vul je familienaam in : max. 100 tekens', 'sub', 'favethemes' ),
			'mail' => _x( 'Vul je e-mail adres in : max. 100 tekens', 'sub', 'favethemes' ),
			'captcha' => _x( 'Vul de controletekens in : max. 30 tekens', 'sub', 'favethemes' ),
			'invalidmail' => _x( 'Je e-mail adres is niet geldig', 'sub', 'favethemes' ),
			'mailcheckfails' => _x( 'Je e-mail adres kon niet worden gecontroleerd', 'sub', 'favethemes' ),
			'user_terms' => _x( 'Gelieve aan te vinken', 'sub', 'favethemes' )
			);
		wp_localize_script( 'signup-js', 'signup_object', $translation_array );
		wp_enqueue_script( 'signup-js', get_stylesheet_directory_uri() . '/js/check_signup.min.js');
	}
}

add_action('wp_enqueue_scripts', 'load_front_end_scripts');