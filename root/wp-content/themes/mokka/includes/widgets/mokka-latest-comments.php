<?php
/*
 * Plugin Name: Latest Comments
 * Plugin URI: http://favethemes.com/
 * Description: A widget that shows latest posts slider or list
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */

class Mokka_Latest_Comments extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'mokka_latest_comments', // Base ID
			__( 'Mokka: Latest Comments',  'favethemes'  ), // Name
			array( 'description' => __( 'Display the most latest comments ',  'favethemes'  ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$comments_show = $instance['comments_show'];
		
		echo $before_widget;
			
			
			if ( $title ) echo $before_title . $title . $after_title;
			
			// Get the comments
			$recent_comments = get_comments( array(
			  'number' => $comments_show,
			  'status' => 'approve',
			  'type' => 'comment',
			  'post_type' => 'post'
			) );
			?>
            
            <div class="recent-comments-widget">
               <div class="inner-widget">
				<?php 
                $commentnum = 1;
                foreach ($recent_comments as $comment){ ?>
                    
                    
                    <div class="recent-comment media">
                      <a class="pull-left colored-bg inline-block" href="<?php echo get_permalink( $comment->comment_post_ID ); ?>">
                      	<?php echo get_avatar( $comment->comment_author_email, '80' ); ?>
                     </a>
                      <div class="media-body">
                        <p><strong><?php echo $comment->comment_author; ?></strong> <?php _e('on: ', 'favethemes' ); ?></p>
                        <h4 class="media-heading">
                        	<a href="<?php echo get_permalink( $comment->comment_post_ID );?>#comment-<?php echo $comment->comment_ID; ?>">
								<?php echo get_the_title( $comment->comment_post_ID ); ?>
                            </a>
                        </h4>
                      </div>
                    </div><!-- .recent-comment -->
                    
                   
                
                <?php } ?>
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
		$instance['comments_show'] = strip_tags( $new_instance['comments_show'] );
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Latest Comments',
			'comments_show' => '5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:',  'favethemes' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'comments_show' ); ?>"><?php _e('Comments to show:',  'favethemes' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'comments_show' ); ?>" name="<?php echo $this->get_field_name( 'comments_show' ); ?>" value="<?php echo $instance['comments_show']; ?>" size="1" />
		</p>
		<p>
	<?php
	}

}
register_widget( 'Mokka_Latest_Comments' );