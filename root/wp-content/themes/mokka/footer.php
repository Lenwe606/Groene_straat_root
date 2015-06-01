<?php

/**

 * The template for displaying the footer

 *

 * @subpackage Mokka

 * @since Mokka 1.0

 */

 global $fave_option; 

?>

<footer class="footer">

    

    <?php get_sidebar( 'footer' ); // Output the footer sidebars ?>

    

    <div class="copyright-wrapper" >

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="copyright"><?php _e( $fave_option['copyright_text'], 'favethemes' ); ?></div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="credits"><?php _e( $fave_option['developedby'], 'favethemes' ); ?></div>

                </div>

            </div>	

        </div>

    </div><!-- .copyright-wrapper -->

</footer>



</div>

<!--/#inner-wrap-->

</div>

<!--/#outer-wrap-->		

	<?php wp_footer(); ?>
	
	<?php if($fave_option['mokka_sticky_nav']==1){ ?> 
	    <script>
	        // Set options
	        var options = {
	            offset: '#showHere',
	            classes: {
	                clone:   'banner--clone',
	                stick:   'banner--stick',
	                unstick: 'banner--unstick'
	            }
	        };
	
	        // Initialise with options
	        var banner = new Headhesive('.banner', options);
	
	        // Headhesive destroy
	        // banner.destroy();
	       
	        
	    </script>
	<?php }?>

</body>

</html>