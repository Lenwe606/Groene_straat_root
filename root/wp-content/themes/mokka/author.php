<?php 
/**
 * Author template. Display the author 
 * info and all posts by the author
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/ 
?>

<?php get_header(); ?>

<?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
		
<div class="container">
	
	<div class="row mokka-fadin animated">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="archive-title"><?php _e( 'Posts by', 'favethemes' ); ?> <i class="icon icon-arrows-01"></i> <span class="archive-name"><?php esc_attr( the_author_meta( 'display_name' )); ?></span></h1>
		</div>
	</div>
	
	<!-- NOTE: content needs the class "col-md-push-3" to stay between both sidebar but first of sithebar in the mobile view. Left sidebar needs the class "col-md-pull-6" for the same reason -->
	
	<div class="row mokka-fadin animated">
		<!-- author info -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-md-push-8">
			<div class="post-author-wrapper post-author-info text-center">
				
				<?php echo get_avatar( $curauth->ID, 400 ); ?>
				
				<h4 class="media-heading"><?php esc_attr( the_author_meta( 'display_name' )); ?></h4>
		    <em class="author-tag-line"><?php esc_attr( the_author_meta( 'fave_author_tagline' )); ?></em>
		    
		    <p><?php esc_attr( the_author_meta( 'description' )); ?></p>
		    
		    <ul class="nav-social list-inline">
		    	<?php
                if(get_the_author_meta('fave_author_flickr')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_flickr').'"><i class="fa fa-flickr"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_pinterest')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_pinterest').'"><i class="fa fa-pinterest-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_youtube')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_youtube').'"><i class="fa fa-youtube-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_foursquare')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_foursquare').'"><i class="fa fa-foursquare"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_instagram')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_instagram').'"><i class="fa fa-instagram"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_twitter')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_twitter').'"><i class="fa fa-twitter-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_vimeo')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_vimeo').'"><i class="fa fa-vimeo-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_facebook')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_facebook').'"><i class="fa fa-facebook-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_google_plus')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_google_plus').'"><i class="fa fa-google-plus-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_linkedin')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_linkedin').'"><i class="fa fa-linkedin-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_tumblr')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_tumblr').'"><i class="fa fa-tumblr-square"></i></a></li>';
					}
					if(get_the_author_meta('fave_author_dribbble')){ 
						echo '<li><a target="_blank" href="'.get_the_author_meta('fave_author_dribbble').'"><i class="fa fa-dribbble"></i></a></li>';
					}
				?>
		    </ul><!-- .nav-social -->

			</div><!-- .post-author -->
		</div>
		<!-- content -->
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-md-pull-3">
			<section class="content">
				
			<?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    
                <div id="post-"<?php the_ID(); ?> <?php post_class("post"); ?>>
                    <div class="row">
                        <!-- start hidden on mobile -->
                        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                            <div class="post-meta ">
                                <ul class="list-unstyled text-right">
                                    <?php fave_post_meta(); ?>
                                </ul>
                            </div>
                        </div>
                        <!-- end hidden on mobile -->
                        <div class="col-lg-10 col-md-10 col-sm-10">
                            <div class="post-content">
                                <?php
									if( 'video' == get_post_format() ){ 
										get_template_part('content', 'video');
									}elseif('audio' == get_post_format()){
										get_template_part('content', 'audio');
									}elseif('gallery' == get_post_format()){
										if( (get_field('slider_or_featured_image')) == 'gallery_slider' ){
											get_template_part('content', 'gallery');
										}else{
											the_post_thumbnail('home-layout-1');
										}
									}elseif('link' == get_post_format()){
										get_template_part('content', 'link');
									}elseif('quote' == get_post_format()){
										get_template_part('content', 'quote');
									}else{
									?>
									<?php if(has_post_thumbnail( get_the_id() )):?>
									<div class="featured-image">
										<a href="<?php esc_url( the_permalink() ); ?>">
											<?php the_post_thumbnail('home-layout-4'); ?>
										</a>
									</div>
									<?php endif; ?>
								<?php } ?>
								<h2 class="post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_attr( the_title() ); ?></a></h2>
                                <!-- start visible on mobile -->
                                <div class="post-meta visible-xs">
                                    <ul class="list-inline">
                                        <?php fave_post_meta(); ?>
                                    </ul>
                                </div>
                                <!-- end visible on mobile -->
                                <div class="entry">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                
                <?php
                // Pageing
                fave_paging_nav();
                ?>
                
                <?php endif; ?>
			</section>
		</div>
		<!-- left sidebar -->
		
	</div>
	
</div>	

<?php get_footer(); ?>