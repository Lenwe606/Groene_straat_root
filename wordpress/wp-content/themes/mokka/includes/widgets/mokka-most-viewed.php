<?php
/*
 * Plugin Name: Most Viewed Posts
 * Plugin URI: http://favethemes.com/
 * Description: A widget that shows most viewed posts
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
 
class mokka_most_viewed extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'mokka_most_viewed', // Base ID
			__( 'Mokka: Most Viewed',  'favethemes'  ), // Name
			array( 'description' => __( 'Show most viewed posts',  'favethemes'  ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$items_num = $instance['items_num'];
		$show_viewed_image = isset($instance['show_viewed_image']) ? 'true' : 'false';
		
		echo $before_widget;
			
			
			if ( $title ) echo $before_title . $title . $after_title;
            ?>
            
            <?php
			/** 
			 * Latest Posts
			**/
			global $post;
			$mokka_most_viewed = new WP_Query(
				array(
					'post_type' => array( 'post' ),
					'meta_key' => 'fave-post_views',
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'posts_per_page' => $items_num
				)
			);
			?>
            
            
			<div class="most-viewed-widget">
				<div class="inner-widget">
                
                <?php 
				if($mokka_most_viewed->have_posts()):
				while ( $mokka_most_viewed->have_posts() ) : $mokka_most_viewed->the_post(); ?>
                
                    <div class="most-viewed media">
                      <?php	if($show_viewed_image=="true"):?>
                      		<a class="pull-left colored-bg inline-block" href="<?php the_permalink(); ?>">
                            	<?php the_post_thumbnail('img-8080'); ?>
                            </a>
                      <?php endif; ?>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><i class="icon icon-seo-icons-11"></i> <?php echo fave_getPostViews(get_the_ID()); ?></p>
                      </div>
                    </div>
                    
                
				<?php 
				endwhile;
				else:
					echo __('<p>no record found</p>', 'favethemes' ); 
				endif;
				?>
				<?php wp_reset_query(); ?>
               
               </div>
            </div>

	    <?php 
		echo $after_widget;
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		/* Strip tags to remove HTML. For text inputs and textarea. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items_num'] = strip_tags( $new_instance['items_num'] );
		$instance['show_viewed_image'] = $new_instance['show_viewed_image'];
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Most Viewed',
			'items_num' => '5',
			'show_viewed_image' => 'on'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:',  'favethemes' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php _e('Maximum posts to show:',  'favethemes' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" value="<?php echo $instance['items_num']; ?>" size="1" />
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id('show_viewed_image'); ?>"><?php _e('Show Image:',  'favethemes' ); ?></label>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_viewed_image'], 'on'); ?> id="<?php echo $this->get_field_id('show_viewed_image'); ?>" name="<?php echo $this->get_field_name('show_viewed_image'); ?>" /> 
		</p>
        
	<?php
	}

}
register_widget( 'mokka_most_viewed' );