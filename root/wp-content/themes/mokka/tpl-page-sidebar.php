<?php 
/**
 * Template Name: Page With Sidebar
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/ 
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
    
    <div class="row">
		<!-- content -->
		<div class="col-lg-7 col-md-7 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
			<section class="content">
				<?php the_content(); ?>
			</section>
		</div>
		<!-- left sidebar -->
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<aside class="sidebar bordered-sidebar">
				<?php dynamic_sidebar( 'page-sidebar' ); ?>
			</aside>
		</div>
	</div>
    
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>	
</div>
	
<?php get_footer(); ?>