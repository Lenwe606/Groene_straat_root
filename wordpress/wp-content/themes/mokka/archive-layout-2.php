<?php 
/**
 * Archive layout 2
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
?>

<?php if (get_field ( 'category_ad', 'category_' . get_query_var('cat') )):?>
<section class="container category_advertising">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row post-row mokka-fadin animated">
            
            <?php the_field ( 'category_ad', 'category_' . get_query_var('cat')); ?>
                        
        </div><!-- .row -->
    </div><!-- .col-lg-12 -->
</section><!-- .container -->
<?php endif; ?>

<div class="container">
    <div class="row mokka-fadin animated">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            
            <?php if (is_category()) { ?>
                <h1 class="archive-title"><?php _e('Category', 'favethemes' ); ?> <i class="icon icon-arrows-01"></i> <span class="archive-name"><?php single_cat_title(); ?></span></h1>
            
            <?php } elseif(is_tag()) { ?>
                <h1 class="archive-title"><?php _e('Tag', 'favethemes' ); ?> <i class="icon icon-arrows-01"></i> <span class="archive-name"><?php single_tag_title(); ?></span></h1>
            
            <?php } elseif (is_day()) { ?>
            	<h1 class="archive-title"><span class="archive-name"><?php printf( __( '%s', 'favethemes' ), get_the_date() ); ?></span></h1>
            
            
            <?php } elseif (is_month()) { ?>
            	<h1 class="archive-title"><span class="archive-name"><?php printf( __( '%s', 'favethemes' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'favethemes' ) ) ); ?></span></h1>
            
            <?php } elseif (is_year()) { ?>
            	<h1 class="archive-title"><span class="archive-name"><?php printf( __( '%s', 'favethemes' ), get_the_date( _x( 'Y', 'yearly archives date format', 'favethemes' ) ) ); ?></span></h1>
            
            <?php } elseif ( get_post_format() ) { ?>
            	<h1 class="archive-title"><span class="archive-name"><?php echo get_post_format(); ?></span></h1>
            
            <?php } elseif (is_author()) { ?>
            	<h1 class="archive-title"><span class="archive-name"><?php _e ( 'Author Archive', 'favethemes' ); ?></span></h1>
            
            <?php } ?>
        </div>
    </div>
    
    <!-- NOTE: content needs the class "col-md-push-3" to stay between both sidebar but first of sithebar in the mobile view. Left sidebar needs the class "col-md-pull-6" for the same reason -->
    
    <div class="row">
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
					fave_paging_nav();
					
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
