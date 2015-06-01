<?php 
/**
 * Template Name: Contact Us
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/ 
global $fave_option;
?>

<?php get_header(); ?>
	
<div class="container">
<?php if( have_posts() ): ?>
<?php while( have_posts() ): the_post(); ?>
	<div class="row mokka-fadin animated">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="page-title"><?php the_title() ?></h1>
		</div>
	</div>	
	
	<div class="row mokka-fadin animated">
		<!-- content -->	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<section class="content">
				<div class="row">
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<address>
									<strong><?php echo $fave_option['company_name']; ?></strong><br />
									<?php echo $fave_option['company_address']; ?>
								</address>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<ul class="contact-address list-unstyled">
									<li><strong><?php _e(' Phone: ', 'favethemes' ); ?></strong>  <?php echo $fave_option['company_phone']; ?></li>
									<li><strong><?php _e(' Email: ', 'favethemes' ); ?></strong>  <?php echo $fave_option['company_email']; ?></li>
									<li><strong><?php _e(' Fax: ', 'favethemes' ); ?></strong> <?php echo $fave_option['company_fax']; ?></li>
								</ul>
							</div>
						</div>
						
						<div class="clearfix"></div>
						
						<?php the_content(); ?>
						
						
					</div>	
					
					<div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-12 col-xs-12">			
						<div class="map">
							<?php echo $fave_option['company_map']; ?>
						</div>
					</div>	
				</div>
			</section>
		</div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>	
</div>
	
<?php get_footer(); ?>