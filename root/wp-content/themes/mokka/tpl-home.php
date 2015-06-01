<?php 
/**
 * Template Name: Home Page
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
?>

<?php get_header(); ?>
	
<?php

	if ( get_field( 'page_layouts' ) == 'layout_1' ):
			get_template_part('home', 'layout-1');
			
	elseif( get_field( 'page_layouts' ) == 'layout_2' ):
			get_template_part('home', 'layout-2');
	
	elseif( get_field( 'page_layouts' ) == 'layout_3' ):
			get_template_part('home', 'layout-3');
	
	elseif( get_field( 'page_layouts' ) == 'layout_4' ):
			get_template_part('home', 'layout-4');
	
	elseif( get_field( 'page_layouts' ) == 'layout_5' ):
			get_template_part('home', 'layout-5');
			
	endif;
?>    
<?php get_footer(); ?>