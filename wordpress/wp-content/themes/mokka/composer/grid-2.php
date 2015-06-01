<?php 
/**
 * Grid 2
 * Page Composer Section
 *
 * @package Mokka
 * @since 	Mokka 1.1
**/
global $fave_option;

$number_of_posts = get_sub_field( 'number_of_posts' );
$mokka_post_from = get_sub_field("select_option");
$mokka_category = get_sub_field("featured_categories");

if($mokka_post_from == 'specific_categories' ){
		$args = array(
			'category__in' => $mokka_category,
			'posts_per_page'  => $number_of_posts,
			'meta_key'        => 'home_grid',
			'meta_value'      => '1',
			'post_type'       => 'post',
			'post_status'     => 'publish'
		);
	}else{
		$args = array(
			'posts_per_page'  => $number_of_posts,
			'meta_key'        => 'home_grid',
			'meta_value'      => '1',
			'post_type'       => 'post',
			'post_status'     => 'publish'
		);
	}

query_posts( $args );
?>
<div class="container">	
	<div class="banner-container mokka-fadin animated banner-container-grid clearfix">
		
        <?php
		if (have_posts()) :
		$i = 0;
        while (have_posts()) : the_post(); 
		$i++;
		if( $i == 1 || $i == 2 ){
			$grid_classes = "col-lg-6 col-md-6 col-sm-12 col-xs-12";
			$img_url = fave_featured_url( get_the_ID(), 'grid-1-img-1' );
		}else{
			$grid_classes = "col-lg-3 col-md-3 col-sm-6 col-xs-12";
			$img_url = fave_featured_url( get_the_ID(), 'grid-1-img-2' );
		}
		
		if( $i == 6 ){ $i = 0; }
		?> 	
			<div class="<?php echo $grid_classes; ?>">
				<ul class="post-banner list-unstyled text-center">
					<li>
						<a class="post-banner-link" href="<?php the_permalink(); ?>">
							<div class="post-banner-content">
								<h2 class="post-banner-title"><?php the_title(); ?></h2>
								<div class="spacer-line"></div>
								<p><?php _e( 'By', 'favethemes' ); ?> <?php the_author(); ?> | <?php _e( 'in', 'favethemes' ); ?>  <?php fave_taxonomy_strip('category'); ?></p>
							</div>
						</a>
						<img src="<?php echo $img_url; ?>" alt="<?php the_title(); ?>">
					</li>
				</ul>
			</div>
            
         <?php
         endwhile; 
         endif;
         wp_reset_query();
         ?>
		
	</div>	
</div>