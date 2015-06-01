<?php 
/**
 * Grid 3
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
<?php $unique_key = fave_element_key(); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var owl = $('#owl-banner-<?php echo $unique_key; ?>'); 
  $("#owl-banner-<?php echo $unique_key; ?>").owlCarousel({
      autoPlay: 5000, //Set AutoPlay to 5 seconds
      navigation : false, // Show next and prev buttons
      slideSpeed : 800,
      paginationSpeed : 400,
      singleItem:true,
      respoansive: true,
      pagination: false,	
	  goToFirstSpeed : 2000,
	  stopOnHover : true
 
  });
  
  // Custom Navigation Events
  $(".common-next-<?php echo $unique_key; ?>").click(function(){
    owl.trigger('owl.next');
  })
  $(".common-prev-<?php echo $unique_key; ?>").click(function(){
    owl.trigger('owl.prev');
  })
 
});

</script>

<div class="container">	
	<div class="banner-container mokka-fadin animated clearfix">
		<div class="row-banner">
			
			<!-- left posts -->
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="banner-slider">
					<div class="owl-banner-arrows">
					    <a class="owl-banner-prev common-prev-<?php echo $unique_key; ?>"><i class="fa fa-angle-left"></i></a>
					    <a class="owl-banner-next common-next-<?php echo $unique_key; ?>"><i class="fa fa-angle-right"></i></a>
					</div>
					
					<div id="owl-banner-<?php echo $unique_key; ?>" class="owl-carousel owl-theme">
					 
                     <?php if(have_posts()): ?>
                     <?php while(have_posts()): the_post(); ?>
                     <?php $img_url = fave_featured_url( get_the_ID(), 'slider-grid-3' ); ?>
					  <div class="item">
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
                      
					  <?php endwhile; ?>
					  <?php endif; ?>
                      <?php wp_reset_query(); ?>
					 
					</div>
				</div>
			</div>


<?php 
if($mokka_post_from == 'specific_categories' ){
	$mokka_featured = new WP_Query(
		array(
			'category__in' => $mokka_category,
			'posts_per_page'  => '2',
			'meta_key'        => 'make_featured',
			'meta_value'      => '1',
			'post_type'       => 'post',
			'post_status'     => 'publish'
		)
	);

}else{
	$mokka_featured = new WP_Query(
		array(
			'posts_per_page'  => '2',
			'meta_key'        => 'make_featured',
			'meta_value'      => '1',
			'post_type'       => 'post',
			'post_status'     => 'publish'
		)
	);
}

?>		
			<!-- right posts -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				
				<div class="row-banner">
					<?php if($mokka_featured->have_posts()): ?>
                    <?php while($mokka_featured->have_posts()): $mokka_featured->the_post(); ?>
                    <?php $img_grid_3 = fave_featured_url( get_the_ID(), 'img-grid-3' ); ?>
					<!-- top -->		
					<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
						<ul class="post-banner list-unstyled text-center">
							<li>
								<a class="post-banner-link" href="<?php the_permalink(); ?>">
					  				<div class="post-banner-content">
					  					<h2 class="post-banner-title"><?php the_title(); ?></h2>
					  					<div class="spacer-line"></div>
					  					<p><?php _e( 'By', 'favethemes' ); ?> <?php the_author(); ?> | <?php _e( 'in', 'favethemes' ); ?>  <?php fave_taxonomy_strip('category'); ?></p>
					  				</div>
					  			</a>
								<img src="<?php echo $img_grid_3; ?>" alt="<?php the_title(); ?>">							
							</li>
						</ul>
					</div>
					
                    <?php endwhile; ?>
				    <?php endif; ?>
                    <?php wp_reset_query(); ?>
					
				</div>
			</div>
			
		</div>
	</div>	
</div>	