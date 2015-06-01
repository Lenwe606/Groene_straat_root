<?php 
/**
 * Search Results
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/ 
?>

<?php get_header(); ?>

<div class="container search-result">
	
	<div class="row mokka-fadin animated">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="archive-title"><?php _e("Search result for", 'favethemes' ); ?>: <i class="icon icon-arrows-01"></i> <span class="archive-name"><?php echo get_search_query(); ?></span></h1>
		</div>
	</div>
	
	<div class="row mokka-fadin animated">
		<!-- content -->
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<section class="content">
				
				<?php if (have_posts()) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
					
                <div id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="featured-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'search-img' ); ?>
								</a>
							</div>
						</div>						
						<div class="col-lg-8 col-md-8 col-sm-8">
							<div class="post-content">
								<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="post-meta ">
									<ul class="list-inline">
										<?php fave_post_meta(); ?>
									</ul>
								</div>
								<div class="entry">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
                <?php fave_paging_nav(); ?>
                <?php else : ?>
					<p class="message"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'favethemes' ); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
				<?php wp_reset_query(); ?>
			</section>
		</div>
		<!-- left sidebar -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<aside class="sidebar bordered-sidebar">
				<?php dynamic_sidebar("page-sidebar"); ?>
			</aside>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>