<?php include_once("/php/include.inc.php"); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Groene Straat</title>
    <link href="css/layout.css" rel="stylesheet"/>
    <!--TODO Meta tags-->
</head>
<body>
<div id="wrapper">
    <div id="content">
        <h1 class="overview_title"><?php echo $events ?></h1>
        <div id="top" style="background: none">
            <section>
                <a href="./index.php?page=newevent"><button class="new_item" id="new_event" name="new_event"><?php echo $new_event ?></button></a>
                <input value="<?php echo $search_filter ?>" class="search_input"/>
            </section>
        </div>
        <div id="bottom">
            <section id="filter">
                <p class="section_header"><?php echo $city_filter ?></p>
                <select id="cboSteden">
                    <?php echo citys(get_citys()); ?>
                </select>
                <p class="section_header"><?php echo $category_filter ?></p>
                <ul><?php echo event_category(get_event_category()); ?></ul>
            </section>
            <section id="items">
                <ul><?php echo events_limited(get_events(), $max_shown_events_per_page); ?></ul>
            </section>
        </div>
    </div>
</div>
<script src="./js/index.js"></script>
</body>
</html>