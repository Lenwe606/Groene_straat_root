<?php 
/**
 * The Template for displaying all single blog posts
 *
 * @package mokka
 * @since 	mokka 1.0
**/
global $fave_option;
?>

<?php get_header(); ?>

<?php
	
	if($fave_option['on_off_single_default_layout'] == 1){
		
		if($fave_option['single_post_default_layout']){
			
			get_template_part($fave_option['single_post_default_layout']);
			
		}
		
	}else{
		
		if ( get_field( 'post_layout' ) == 'layout_1' ):
			get_template_part('single', 'layout-1');
			
		elseif( get_field( 'post_layout' ) == 'layout_2' ):
				get_template_part('single', 'layout-2');
		
		elseif( get_field( 'post_layout' ) == 'layout_3' ):
				get_template_part('single', 'layout-3');
		
		elseif( get_field( 'post_layout' ) == 'layout_4' ):
				get_template_part('single', 'layout-4');
		
		else:
				get_template_part('single', 'layout-4');
				
		endif;
		
	}

?>
	
<?php get_footer(); ?>