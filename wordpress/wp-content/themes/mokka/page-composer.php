<?php 
/**
 * Template Name: Page Composer
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
?>

<?php get_header(); ?>
        
		<?php
		
        /*=== Homepage Builder ===*/ 
        while( has_sub_field( "page_composer" ) ):
            
            
			if(get_row_layout() == "grid_slider" ):
			 	 
				 if( get_sub_field('grid_or_slider') == 'grid_1' ):
				 	get_template_part ( 'composer/grid', '1' );
				 
				 elseif( get_sub_field('grid_or_slider') == 'grid_2' ):
				 	get_template_part ( 'composer/grid', '2' );
				
				 elseif( get_sub_field('grid_or_slider') == 'grid_3' ):
				 	get_template_part ( 'composer/grid', '3' );
				 
				 elseif( get_sub_field('grid_or_slider') == 'owlCarousel' ):
				 	get_template_part ( 'composer/sliders/owlCarousel');
				 
				 endif;	

			// Latest Posts
			elseif( get_row_layout() == "latest_posts" ):
			?>
				
                <!-- .composer title -->
				<?php if( get_sub_field( 'main_title' ) || get_sub_field( 'sub_title' ) ): ?>
                <div class="container">
                    <div class="row mokka-fadin animated">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="latestposts-composer-title-wrapper">
                                <?php if( get_sub_field( 'main_title' ) ): ?>
                                <h2 class="composer-title text-center"><?php the_sub_field( 'main_title' ); ?></h2>
                                <?php endif; ?>
                                <?php if( get_sub_field( 'sub_title' ) ): ?>
                                <p class="composer-sub-title text-center"><?php the_sub_field( 'sub_title' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>	
                <?php endif; ?>
                
                <?php
				if(get_sub_field("posts_layout")=="layout_1"):
					get_template_part('home', 'layout-1');
				
				elseif(get_sub_field("posts_layout")=="layout_2"):
					get_template_part('home', 'layout-2');
				
				elseif(get_sub_field("posts_layout")=="layout_3"):
					get_template_part('home', 'layout-3');
				
				elseif(get_sub_field("posts_layout")=="layout_4"):
					get_template_part('home', 'layout-4');
				
				elseif(get_sub_field("posts_layout")=="layout_5"):
					get_template_part('home', 'layout-5');
					
				endif;
			
			// Latest by category
			elseif( get_row_layout() == "latest_by_category" ):
					get_template_part ( 'composer/category');
			
			// Featured Posts
			elseif( get_row_layout() == "featured_posts" ):
					get_template_part ( 'composer/featured', 'posts');
				
			// Latest by format
			elseif( get_row_layout() == "latest_by_format" ):
					get_template_part ( 'composer/format' );
		
			//Code Box
			elseif(get_row_layout() == "code_box" ):
					get_template_part ( 'composer/code', 'box' );
			
			//Wysiwyg Editor
			elseif(get_row_layout() == "wysiwyg_editor" ):
					get_template_part ( 'composer/wysiwyg', 'editor' );
			
                
            endif;
            
        endwhile;
		wp_reset_query();
        ?>

<?php get_footer(); ?>