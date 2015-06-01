<?php 
/**
 * 404 error page
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/ 
global $fave_option;
?>

<?php get_header(); ?>
	
<div class="container">

	<div class="row mokka-fadin animated">
		<!-- content -->	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<section class="content">
				
                <div class="post single-post">

                    <div class="post-content">
                    
                            <div class="entry">
                               <?php if( $fave_option['error_image'] !='' ){ ?>
                                    <img src="<?php echo $fave_option['error_image']; ?>" alt="<?php echo $fave_option['error_title']; ?>" width="400" height="400" />
                                <?php } ?>
                                <h1><?php echo $fave_option['error_title']; ?></h1>
                            </div><!-- .entry -->
                            
                        </div>
                
                </div>
                
			</section>
		</div>
	</div>

</div>
	
<?php get_footer(); ?>