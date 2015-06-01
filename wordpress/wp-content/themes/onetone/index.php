<?php
/**
* The main template file.
*
*/
 ?>
<?php
if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) {
get_header('site'); 
?>
<div class="site-main">
		<div class="main-content">
			<div class="content-area">
				<div class="site-content" role="main">
					<header class="archive-header">
						<h1 class="archive-title"><?php onetone_get_breadcrumb();?></h1>
					</header>
					<?php if (have_posts()) :?>
                    <?php while ( have_posts() ) : the_post(); 
					
					    get_template_part("content","article");
					?>
                   <?php endwhile;?>
                   <?php endif;?>
					
					<nav class="paging-navigation">
						<div class="loop-pagination">
							<?php if(function_exists("onetone_native_pagenavi")){onetone_native_pagenavi("echo",$wp_query);}?>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!--main--> 

		<?php get_sidebar();?>
		<!--sidebar--> 
	</div>
<?php
get_footer('site');
}else{
?>

<?php 
get_header();?>

<?php require("include.inc.php");
 ?>

<div id="wrapper">
    <div id="content">
        <section id="news" class="section_header">
            <h1 class="section_name"><?php echo $news; ?></h1>
            <ul><?php echo news_limitid($newsArray, $max_shown_news); ?></ul>
        </section>
        <section id="events" class="section_header">
            <h1 class="section_name"><?php echo $future_events; ?></h1>
            <ul><?php echo events_limited($eventsArray, $max_shown_events); ?></ul>
            <?php
            if (count($eventsArray) > $max_shown_events) {
                ?>
                <p class="more_items"><a href="eventoverview.php"><?php echo $more_events; ?></a></p>
            <?php
            }
            ?>
        </section>
        <section id="projects" class="section_header">
            <h1 class="section_name"><?php echo $popular_projects ?></h1>
            <ul><?php echo projects_limited($projectsArray, $max_shown_projects); ?></ul>
            <?php
            if (count($projectsArray) > $max_shown_projects) {
                ?>
                <p class="more_items"><a href="projectoverview.php"><?php echo $more_projects; ?></a></p>
            <?php
            }
            ?>
        </section>
    </div>
</div>

<?php get_footer();}?>