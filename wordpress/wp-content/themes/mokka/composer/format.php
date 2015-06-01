<?php 
/**
 * Latest Posts By Category
 * Page Composer Section
 *
 * @package Mokka
 * @since 	Mokka 1.1
**/
global $fave_option;

$format_name = get_sub_field( 'format' );

$posts_per_page = get_sub_field("number_of_posts");

if ( get_sub_field( 'format' ) == 'standard' ):
	$format_args = array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' =>  array( 'post-format-video', 'post-format-gallery', 'post-format-audio', 'post-format-link', 'post-format-quote' ),
			'operator' => 'NOT IN'
		);
else:
	$format_args = array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => 'post-format-'.$format_name
		);
endif;

$args = array(
	'posts_per_page' => $posts_per_page,
	'post_type'      => 'post',
	'tax_query' 	 => array( $format_args ),
	'post_status'    => 'publish'
);
query_posts( $args );
?>

<div class="container">	
	<div class="composer clearfix">
		
		<!-- .composer title -->
        <?php if( get_sub_field( 'main_title' ) || get_sub_field( 'sub_title' ) ): ?>
		<div class="row mokka-fadin animated">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="composer-title-wrapper">
                	<?php if( get_sub_field( 'main_title' ) ): ?>
					<h2 class="composer-title text-center"><?php the_sub_field( 'main_title' ); ?></h2>
                    <?php endif; ?>
                    <?php if( get_sub_field( 'sub_title' ) ): ?>
					<p class="composer-sub-title text-center"><?php the_sub_field( 'sub_title' ); ?></p>
                    <?php endif; ?>
				</div>
			</div>
		</div>	
		<?php endif; ?>
        
		<!-- .composer content -->
		<div class="row mokka-fadin animated">
		
			<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div id="post-"<?php the_ID(); ?> <?php post_class("post"); ?>>
                            <div class="post-content">
                                <div class="featured-image">
                                    <div class="icon-wrapper">
                                        <?php fave_composer_posts_icons(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('home-layout-1'); ?>
                                    </a>
                                </div>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <!-- start visible on mobile -->
                                <div class="post-meta">
                                    <ul class="list-inline">
                                        <?php fave_post_meta_for_composer(); ?>
                                    </ul>
                                </div>
                                <!-- end visible on mobile -->
                                <?php if( get_sub_field( 'posts_excerpt' ) == "enable" ): ?>
                                <div class="entry">
                                    <p><?php echo wp_trim_words( strip_shortcodes( get_the_content() ), 25 ); ?></p>
                                    <a class="continue-reading" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading...', 'favethemes' );?></a>
                                </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
            
            <?php endwhile; ?>
            <?php endif; ?>
		
		</div><!-- End: .row -->

	</div> <!-- End: .composer clearfix -->	
</div> <!-- End: .container -->
<?php wp_reset_query(); ?>