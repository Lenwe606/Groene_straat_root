<?php
/**
 * The default template for displaying content gallery
 *
 * @package Mokka
 * @since Mokka 1.0
 */
?>
<!-- ============= post with carousel ============= -->
<?php $unique_key = fave_element_key(); ?>

<?php if( (get_field('gallery_type')) == 'grid' ){
		
		$mokka_targetheight = get_field('target_height');
		$mokka_gallery_margins = get_field('grid_margins');
		$mokka_gallery_randomize = get_field('grid_randomize');
?>

	<script type="text/javascript">
	jQuery(document).ready(function () {
			jQuery(".justifiedgall_<?php echo $unique_key; ?>").justifiedGallery({
				rowHeight: <?php echo $mokka_targetheight; ?>,
				fixedHeight: false,
				lastRow: 'justify',
				margins: <?php echo $mokka_gallery_margins; ?>,
				randomize: <?php echo $mokka_gallery_randomize; ?> 
			}); });

    </script>
    
    <div class="post-gallery-wrapper">
    	
        <div class="justifiedgall_<?php echo $unique_key; ?>" style="margin: 0px 0px 1.5em;">
        		
                <?php
				// Output the uploaded images as gallery
				$images = get_field( 'upload_gallery_images' );
				if ( $images ):
					foreach( $images as $image ):
						if ( !empty ( $image['alt'] ) ){
							$alt = $image['alt'];
						} else {
							$alt = $image['title'];
						}
						$img_src = $image['sizes']['large'];
						$size = GetImageSize( $img_src ); ?>
						
							<a class="mokka-ilightbox" href="<?php echo $img_src; ?>">
								<img src="<?php echo $img_src; ?>" alt="<?php echo $alt; ?>">
							</a>
			   <?php        
					endforeach;
				endif;
				
				?>
                
        </div>
    
    </div>


<?php }else{ 
	
	$mokka_auto_slide = get_field('auto_slide');
	$mokka_slide_speed = get_field('slide_speed');
?>		
<script type="text/javascript">
jQuery(document).ready(function($) {
    
	var owl = $('.post-carousel-<?php echo $unique_key; ?>');
	owl.owlCarousel({
		  autoPlay: 5000, //Set AutoPlay to 5 seconds
		  stopOnHover : true,
		  navigation : false,
		  pagination: true,
		  goToFirstSpeed : 2000,
		  slideSpeed : 800,
		  responsive : true,
		  singleItem : true,
		  autoHeight : true,
		  transitionStyle:"fade",

	  });
	  
	  // Custom Navigation Events
	  /*$(".common-next-<?php echo $unique_key; ?>").click(function(){
		  owl.trigger('owl.next');
	  })
	  $(".common-prev-<?php echo $unique_key; ?>").click(function(){
		  owl.trigger('owl.prev');
	  })*/
});
</script>
<div class="post-carousel-wrapper">
    
    <?php /*?><div class="carousel-arrows">
        <a class="carousel-prev common-prev-<?php echo $unique_key; ?>"><i class="fa fa-angle-left"></i></a>
        <a class="carousel-next common-next-<?php echo $unique_key; ?>"><i class="fa fa-angle-right"></i></a>
    </div><?php */?>
    <div class="post-carousel-<?php echo $unique_key; ?>">
        
        <?php
        // Output the uploaded images as gallery
        $images = get_field( 'upload_gallery_images' );
        if ( $images ):
            foreach( $images as $image ):
                if ( !empty ( $image['alt'] ) ){
                    $alt = $image['alt'];
                } else {
                    $alt = $image['title'];
                }
                $img_src = $image['sizes']['standard-large'];
				$size = GetImageSize( $img_src ); ?>
                
                <div class="post-carousel-slide">
                    <a class="mokka-carousel-ilightbox" href="<?php echo $img_src; ?>">
                        <img src="<?php echo $img_src; ?>" alt="<?php echo $alt; ?>">
                    </a>
                </div>
       <?php        
            endforeach;
        endif;
        
        ?>
       
    </div>
</div>
<?php } // End Else?>