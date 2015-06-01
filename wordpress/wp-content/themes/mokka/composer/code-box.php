<?php 
/**
 * Code Box
 * Page Composer Section
 *
 * @package Mokka
 * @since 	Mokka 1.1
**/
?>

<div class="container advertising">
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
	  <div class="row mokka-fadin animated">
	      
	      <div class="col-lg-12 col-md-12 col-sm-12">
							
				<?php the_sub_field( 'source_code' ); ?>
			
		</div><!-- .col-lg-9 -->
	      
	    </div><!-- .row -->
	</div>	
   
</div><!-- .container -->