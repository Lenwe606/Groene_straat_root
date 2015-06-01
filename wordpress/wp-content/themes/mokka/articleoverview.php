<?php include_once("/php/include.inc.php");?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Groene Straat</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/layout.css" media="screen" />
</head>
<body>
<div id="wrapper">
    <div id="content">
        <h1 class="overview_title"><?php echo $articles ?></h1>
        <div id="top" style="background:none;">
            <section>
                <a href="./index.php?page=newarticle"><button class="new_item" id="new_article" name="new_article"><?php echo $new_article ?></button></a>
                <input value="<?php echo $search_filter ?>" class="search_input"/>
            </section>
        </div>
        <div id="bottom">
            <section id="filter">
                <p class="section_header"><?php echo $category_filter ?></p>
                <ul><?php echo project_category(get_project_category()); ?></ul>
            </section>
            <section id="items">
                <ul><?php echo articles_limited(get_articles($max_shown_articles_per_page), $max_shown_articles_per_page); ?></ul>
            </section>
        </div>
    </div>
</div>
<script src="./js/index.js"></script>
</body>
</html>