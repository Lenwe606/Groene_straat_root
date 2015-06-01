<?php 
/**
 * The Category page
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
?>

<?php get_header(); ?>

<?php
	
	if( get_field ( 'category_layouts', 'category_' . get_query_var('cat') ) == 'layout_1' ):
			get_template_part('archive', 'layout-1');
			
	elseif( get_field ( 'category_layouts', 'category_' . get_query_var('cat') ) == 'layout_2' ):
			get_template_part('archive', 'layout-2');
	
	elseif( get_field ( 'category_layouts', 'category_' . get_query_var('cat') ) == 'layout_3' ):
			get_template_part('archive', 'layout-3');
	
	elseif( get_field ( 'category_layouts', 'category_' . get_query_var('cat') ) == 'layout_4' ):
			get_template_part('archive', 'layout-4');
	
	elseif( get_field ( 'category_layouts', 'category_' . get_query_var('cat') ) == 'layout_5' ):
			get_template_part('archive', 'layout-5');
	else:
			get_template_part('archive', 'layout-1');
	endif;
?>   
 
<?php get_footer(); ?>