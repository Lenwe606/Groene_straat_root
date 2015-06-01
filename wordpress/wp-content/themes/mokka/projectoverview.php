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
        <h1 class="overview_title"><?php echo $projects ?></h1>
        <div id="top">
            <section>
                <a href="./index.php?page=newproject"><button class="new_item" id="new_project" name="new_project"><?php echo $new_project ?></button></a>
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
                <ul><?php echo project_category(get_project_category()); ?></ul>
            </section>
            <section id="items">
                <ul><?php echo projects_limited(get_projects(), $max_shown_projects_per_page); ?></ul>
            </section>
        </div>
    </div>
</div>
<script src="./js/index.js"></script>
</body>
</html>