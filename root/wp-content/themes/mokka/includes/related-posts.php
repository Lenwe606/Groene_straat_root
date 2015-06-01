<?php 
/*
	Related posts
	@mokka
*/
global $fave_option; 
?>
<?php
$posts_to_show =  $fave_option['single_related_posts_to_show'];

if($fave_option['related_random'] == 1 ){ $random = 'rand'; } else {$random = '';}

if($fave_option['single_related_posts_by'] == 'related_tags'){
	/***************** Start by Tag *********************/
	$tags = wp_get_post_tags($post->ID);  
	if ($tags):
	  $tag_ids = array(); 
	  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
	  $args=array( 
		'tag__in' => $tag_ids, 
		'post__not_in' => array($post->ID), 
		'posts_per_page'=> $posts_to_show,
		'orderby' => $random
	  );      
	  $related_posts = get_posts( $args );
	endif;
	/***************** End by Tag *********************/
}else{
	$categories = get_the_category( $post->ID );
	if ($categories):
	  $cat_ids = array(); 
	  foreach($categories as $individual_cat) $cat_ids[] = $individual_cat->term_id; 
	  $args=array( 
		'category__in' => $cat_ids,
		'post__not_in' => array( $post->ID ),
		'posts_per_page' => $posts_to_show,
		'orderby' => $random
	  );      
	  $related_posts = get_posts( $args );
	endif;
}
?>
<?php if( $related_posts ) {?>
<h3 class="related-posts-title text-center"><?php _e( $fave_option['single_related_title'], 'favethemes' ); ?></h3>
<div class="row">
    
    <?php foreach( $related_posts as $post ): setup_postdata( $post ); ?>	
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="related-post">
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>">
                    <?php
					if( has_post_thumbnail() ): 
						the_post_thumbnail(); 
					else: ?>
                    	<img src="<?php echo get_template_directory_uri();?>/images/pixel.gif" width="186" height="186" />
					<?php	
					endif;
					?>
                </a>
            </div><!-- .featured-image -->
            <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <div class="entry">
                <p><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></p>
                <a class="continue-reading" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading...', 'favethemes' ); ?></a>                
            </div>
        </div>
    </div><!-- .col-lg-4 col-md-4 col-sm-12 col-xs-12 -->
   <?php endforeach; ?>
   
</div>
<?php
}
wp_reset_postdata();
?>