<?php
/**
 * The default template for displaying content
 *
 * @package Mokka
 * @since Mokka 1.0
 */
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

