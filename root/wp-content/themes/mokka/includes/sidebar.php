<?php
/**
 * Register our sidebars and widgetized areas.
 * @package Mokka
 * @since Mokka 1.0
 * Author: Favethemes
 *
 */
function favethemes_widgets_init() {

	
	// Left Sidebar
	register_sidebar( array(
		'name' => 'Sidebar Left',
		'id' => 'sidebar-left',
		'description'   => __( 'These are widgets for the left sidebar.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Right Sidebar
	register_sidebar( array(
		'name' => 'Sidebar Right',
		'id' => 'sidebar-right',
		'description'   => __( 'These are widgets for right sidebar.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Page Sidebar
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'description'   => __( 'These are widgets for the pages.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Area One
	register_sidebar( array(
		'name' => 'Footer Area One',
		'id' => 'footer-sidebar-1',
		'description'   => __( 'These are widgets for the footer area one.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Footer Area Two
	register_sidebar( array(
		'name' => 'Footer Area Two',
		'id' => 'footer-sidebar-2',
		'description'   => __( 'These are widgets for the footer area two.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Footer Area Three
	register_sidebar( array(
		'name' => 'Footer Area Three',
		'id' => 'footer-sidebar-3',
		'description'   => __( 'These are widgets for the footer area three.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Footer Area Four
	register_sidebar( array(
		'name' => 'Footer Area Four',
		'id' => 'footer-sidebar-4',
		'description'   => __( 'These are widgets for the footer area four.', 'favethemes' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
}
add_action( 'widgets_init', 'favethemes_widgets_init' );
?>