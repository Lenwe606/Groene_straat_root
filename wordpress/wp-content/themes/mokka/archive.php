<?php 
/**
 * The archive page
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
global $fave_option;
?>

<?php get_header(); ?>

<?php
	
	if( $fave_option['archive_layout'] == 'layout_1' ):
			get_template_part('archive', 'layout-1');
			
	elseif( $fave_option['archive_layout'] == 'layout_2' ):
			get_template_part('archive', 'layout-2');
	
	elseif( $fave_option['archive_layout'] == 'layout_3' ):
			get_template_part('archive', 'layout-3');
	
	elseif( $fave_option['archive_layout'] == 'layout_4' ):
			get_template_part('archive', 'layout-4');
	
	elseif( $fave_option['archive_layout'] == 'layout_5' ):
			get_template_part('archive', 'layout-5');
	else:
			get_template_part('archive', 'layout-4');
	endif;
?>   
 
<?php get_footer(); ?>