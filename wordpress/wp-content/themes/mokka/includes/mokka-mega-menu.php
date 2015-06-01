<?php
/* --------------------------------------------------------------------------

	Mokka Mega Menu Function

    - Mokka 1.0

 ---------------------------------------------------------------------------*/

class Mokka_Mega_Menu extends Walker_Nav_Menu {
		
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"nav-sub-menus\"><ul>\n";
    }
	
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
	
    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		
        global $wp_query;
		$cat = $item->object_id;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
        
		if( $depth == 0 ){
			$output .= '<li class="nav-icon"><i class="fa fa-circle"></i></li>';
		}
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$children = get_posts(array(
			'post_type' => 'nav_menu_item',
			'nopaging' => true,
			'numberposts' => 1,
			'meta_key' => '_menu_item_menu_item_parent',
			'meta_value' => $item->ID
		));
		if ( ! empty( $children ) || ! get_field( 'menu_latest_posts', 'category_' . $cat ) || get_field( 'menu_latest_posts', 'category_' . $cat ) == 'menu_latest_posts_on' ) {
			if ( $depth == 0 && $item->object == 'category' || $item->object == 'page' || $item->object == 'custom' ) {
				$item_output  .= '<div class="nav-sub-wrap container"><div class="fave row">';
			}
		}
        $item_output .= $args->after;
		
		
		/* --------------------------------------------------------------------------
		 * Only for category & category parrent
		 ---------------------------------------------------------------------------*/
		if ( $depth == 0 && $item->object == 'category' ) { 
			
			$cat = $item->object_id;
			
			if ( ! get_field( 'menu_latest_posts', 'category_' . $cat ) || get_field( 'menu_latest_posts', 'category_' . $cat ) == 'menu_latest_posts_on' ){ // Add Posts to menu if 'latest_posts' field is set to 'Add'
				
				$item_output .= '<div class="nav-sub-posts"><div class="row">';
				
					global $post;
					$post_args = array( 'numberposts' => 4, 'offset'=> 0, 'category' => $cat );
					$menuposts = get_posts( $post_args );
					
					foreach( $menuposts as $post ) : setup_postdata( $post );
					
						$post_title = get_the_title();
						$post_link = get_permalink();
						
						$post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "menu-thumb" );
						
						if ( !empty($post_image[0]) ){ 
							$menu_post_image = '<img class="zoom-it three" src="' . $post_image[0]. '" alt="' . $post_title . '" width="' . $post_image[1]. '" height="' . $post_image[2]. '" />'; 
						} elseif( fave_first_post_image() ) { 
							$menu_post_image = '<img class="zoom-it three" src="' . fave_first_post_image() . '" class="wp-post-image" alt="' . $post_title . '" />';
						} else {
							$menu_post_image = __( 'No image', 'favethemes' );
						}
						
						$item_output .= '
							<div class="col-sm-3">';

						
						$item_output .= '<figure class="thumb-wrap zoom-zoom">
								<a href="'  .$post_link . '" rel="bookmark" title="' . $post_title . '">' . $menu_post_image . '</a>
							</figure>';
						
						
						$item_output .= '<a class="entry-title" href="' . $post_link . '">' . $post_title . '</a>';
						$item_output .='<a class="continue-reading" href="' .$post_link . '">'.__( 'Continue reading...', 'favethemes' ).'</a>
							</div>';
						
					endforeach;
					wp_reset_query();
					
				$item_output .= '</div></div>';
				
			}
			
		}
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
	
	
    function end_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$cat = $item->object_id;
		$children = get_posts(array(
			'post_type' => 'nav_menu_item',
			'nopaging' => true,
			'numberposts' => 2,
			'meta_key' => '_menu_item_menu_item_parent',
			'meta_value' => $item->ID
		));
		if ( ! empty( $children ) || ! get_field( 'menu_latest_posts', 'category_' . $cat ) || get_field( 'menu_latest_posts', 'category_' . $cat ) == 'menu_latest_posts_on' ) {
			if ( $depth == 0 && $item->object == 'category' || $item->object == 'page' ) {
				$output .= "</div></div>\n";
			}
		}
		$output .= "</li>\n";
    }
	
}