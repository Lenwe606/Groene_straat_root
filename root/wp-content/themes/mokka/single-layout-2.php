<?php 
/**
 * Single Layout 2
 *
 * @package mokka
 * @since 	mokka 1.0
**/
?>

<div class="container">
<!-- NOTE: content needs the class "col-md-push-3" to stay between both sidebar but first of sithebar in the mobile view. Left sidebar needs the class "col-md-pull-6" for the same reason -->

<?php if(have_posts()): ?>
<?php while(have_posts()): the_post();?>
	<?php
    // Set post view
	fave_setPostViews(get_the_ID());
    ?>
	<div class="row mokka-fadin animated">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-push-3">
			<section class="content">
				<?php get_template_part('includes/single', 'common'); ?>
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
	
<?php endwhile; ?>
<?php endif; ?>	
</div>