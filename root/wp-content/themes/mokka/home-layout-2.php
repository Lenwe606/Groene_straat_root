<?php 
/**
 * Home layout 2
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
?>
<?php
//adhere to paging rules
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

if(get_sub_field( 'number_of_posts' )){
	
	$number_of_posts = get_sub_field( 'number_of_posts' );
	
	global $query_string;
		$args = array(
			'post_type'       => 'post',
			'posts_per_page'  => $number_of_posts,
			'paged'				=> $paged,
			'post__not_in' => get_sub_field( 'exclude_latest_posts' ),
			'post_status'     => 'publish'
		);
	
}else{
	global $query_string;
		$args = array(
			'post_type'       => 'post',
			'paged'				=> $paged,
			'post__not_in' => get_sub_field( 'exclude_latest_posts' ),
			'post_status'     => 'publish'
		);
}

query_posts( $args );
?>
<div class="container">

	<!-- NOTE: content needs the class "col-md-push-3" to stay between both sidebar but first of sithebar in the mobile view. Left sidebar needs the class "col-md-pull-6" for the same reason -->
	
	<div class="row mokka-fadin animated">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-push-3">
			<section class="content">
				<?php
                if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
                <div id="post-"<?php the_ID(); ?> <?php post_class("post"); ?>>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
								if( 'video' == get_post_format() ){ 
									get_template_part('content', 'video');
								}elseif('audio' == get_post_format()){
									get_template_part('content', 'audio');
								}elseif('gallery' == get_post_format()){
									get_template_part('content', 'gallery');
								}elseif('link' == get_post_format()){
									get_template_part('content', 'link');
								}elseif('quote' == get_post_format()){
									
								}else{
								?>
								<?php if(has_post_thumbnail( get_the_id() )):?>
								<div class="featured-image">
									<a href="<?php esc_url( the_permalink() ); ?>">
										<?php the_post_thumbnail('home-layout-2'); ?>
									</a>
								</div>
								<?php endif; ?>
							<?php } ?>
                        </div>	
                    </div>
                    <div class="row">
                        
						
                        <!-- start hidden on mobile and medium desktop -->
                        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs hidden-md">
                            <div class="post-meta ">
                                <ul class="list-unstyled text-right">
                                    <?php fave_post_meta(); ?>
                                </ul>
                            </div>
                        </div>
                        
                        
                        <!-- end hidden on mobile and medium desktop -->
                        <div class="col-lg-10 col-md-12 col-sm-10">
                            <div class="post-content">
                                <?php if('quote' != get_post_format()){?>
                                    <h2 class="post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_attr( the_title() ); ?></a></h2>
                                <?php } ?>
                                <!-- start visible on mobile and medium desktop -->
                                <div class="post-meta visible-xs visible-md">
                                    <ul class="list-inline">
                                        <?php fave_post_meta(); ?>
                                    </ul>
                                </div>
                                <!-- end visible on mobile and medium desktop -->
                                <div class="entry">
                                    <?php 
                                    if('quote' == get_post_format()){
                                        get_template_part('content', 'quote');
                                    }else{
                                        the_excerpt();
                                    }
                                    ?>
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php	
					endwhile;
					
					// Pageing
					if(get_sub_field("latest_posts_pagination") == "enable"){
						fave_paging_nav();
					}
					
					if(!get_sub_field("latest_posts_pagination")){
						fave_paging_nav();
					}
					
				endif;
				wp_reset_query();
				?>
			</section>
		</div>
		<!-- left sidebar -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-md-pull-6">
			<aside class="sidebar bordered-sidebar">
				<?php get_sidebar('left'); ?>
			</aside>
		</div>
		<!-- right sidebar -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<aside class="sidebar bordered-sidebar">
				<?php get_sidebar('right'); ?>
			</aside>
		</div>
	</div>
	
</div>