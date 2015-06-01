<?php
/*
 * Plugin Name: Most Commented Posts Widget
 * Plugin URI: http://favethemes.com/
 * Description: A widget that show the most commented posts
 * Version: 1.0
 * Author: favethemes
 * Author URI: http://favethemes.com/
 */

class Mokka_Most_Commented extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'mokka_most_commented', // Base ID
			__( 'Mokka Most Commented Posts', 'favethemes' ), // Name
			array( 'description' => __( 'Show a list of the most commented posts with comments count', 'favethemes' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$items_num = $instance['items_num'];
		
		echo $before_widget;
			
			
			if ( $title ) echo $before_title . $title . $after_title;
            ?>
            
            <?php
			/** 
			 * Posts by comment count
			**/
			global $post;
			$mokka_most_commented = new WP_Query(
				array(
					'post_type' => 'post',
					'order' => 'DECS',
					'orderby' => 'comment_count',
					'posts_per_page' => $items_num
				)
			);
			?>
            
            <div class="most-commented-widget">
				<div class="inner-widget clearfix">
            
			
            <?php while ( $mokka_most_commented->have_posts() ) : $mokka_most_commented->the_post(); ?>
                
                <?php if( has_post_thumbnail() ): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="most-commented-post">
                        <div class="most-commented-external">
                            <div class="most-commented-internal">
                                <div class="most-commented-icon-wrapper">
                                    <i class="icon icon-chat-messages-01 icon-x2"></i>
                                </div><!-- .most-commented-icon-wrapper -->
                                <div class="most-commented-likes-wrapper">
                                    <a class="most-commented-widget-link" href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ); ?></a>
                                </div><!-- .most-commented-likes-wrapper -->
                            </div><!-- .most-commented-internal -->
                        </div><!-- .most-commented-external -->
                    </div><!-- .most-commented-post -->
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
                
            <?php endwhile;  ?>
            
            	</div>
            </div>
                
			<?php wp_reset_query(); ?>

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
		$instance['items_num'] = $new_instance['items_num'];
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Most Commented',
			'items_num' => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themeText'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
        	<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php _e('Maximum posts to show:', 'favethemes'); ?></label>
			<select id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" class="widefat">
            	<?php for ( $num=1; $num<=15; $num++ ){ ?>
				<option value="<?php echo $num; ?>" <?php if ( $instance["items_num"] == $num ) echo 'selected="selected"'; ?>><?php echo $num; ?></option>
                <?php } ?>
			</select>
		</p>
	<?php
	}

}
register_widget( 'Mokka_Most_Commented' );