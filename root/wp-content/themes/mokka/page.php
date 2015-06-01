<?php 
/**
 * The template for displaying all pages
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
	
	<div class="row mokka-fadin animated">
		<!-- content -->	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<section class="content">
				
                <div class="post single-post">

                    <div class="post-content">
                    
                            <div class="entry">
                               <?php the_content(); ?>
                            </div><!-- .entry -->
                            
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