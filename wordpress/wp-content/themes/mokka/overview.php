<?php include_once("/php/include.inc.php");?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Groene Straat</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/layout.css" media="screen" />
    <!--TODO Meta tags-->
</head>
<body>

<div id="wrapper">
    <div id="content">
        <section id="news" class="section_header">
            <h1 class="section_name"><?php echo $news; ?></h1>
            <ul><?php echo news_limitid(get_news(), $max_shown_news); ?></ul>
        </section>

        <section id="events" class="section_header">
            <h1 class="section_name"><?php echo $future_events; ?></h1>
            <ul><?php echo events_limited(get_new_events($max_shown_events), $max_shown_events); ?></ul>
            <?php
            if (count(get_events()) > $max_shown_events) {
                ?>
                <p class="more_items"><a href="?page=eventoverview"><?php echo $more_events; ?></a></p>
            <?php
            }
            ?>
        </section>

        <section id="projects" class="section_header">
            <h1 class="section_name"><?php echo $popular_projects ?></h1>
            <ul><?php echo projects_limited(get_popular_projects($max_shown_projects), $max_shown_projects); ?></ul>
            <?php
            if (count(get_projects()) > $max_shown_projects) {
                ?>
                <p class="more_items"><a href="?page=projects"><?php echo $more_projects; ?></a></p>
            <?php
            }
            ?>
        </section>
    </div>
</div>
</body>
</html>