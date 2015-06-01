<?php
/**
 * The template for displaying the footer.
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/
global $fave_option;
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-sidebar-1'  )
		&& ! is_active_sidebar( 'footer-sidebar-2' )
		&& ! is_active_sidebar( 'footer-sidebar-3'  )
		&& ! is_active_sidebar( 'footer-sidebar-4'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.

if($fave_option['footer_layout'] == 'four-column'){
	
	$footer_classes = 'col-lg-3 col-md-3 col-sm-3 col-xs-12';
	
}elseif($fave_option['footer_layout'] == 'three-column'){
	
	$footer_classes = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';

}else{
	$footer_classes = 'col-lg-3 col-md-3 col-sm-3 col-xs-12';
}
	
?>

<div class="container">
    <div class="row">
        <div class="<?php echo $footer_classes; ?>">
            <div class="widget-footer-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
                		
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                        
                <?php endif; ?>
            </div>
        </div>
        <div class="<?php echo $footer_classes; ?>">
            <div class="widget-footer-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
                
                		<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                
                <?php endif; ?>
            </div>
        </div>
        <div class="<?php echo $footer_classes; ?>">
            <div class="widget-footer-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
                
                		<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                
                <?php endif; ?>
            </div>
        </div>
        
        <?php if($fave_option['footer_layout'] == 'four-column'): ?>
        <div class="<?php echo $footer_classes; ?>">
            <div class="widget-footer-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
                
                		<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>