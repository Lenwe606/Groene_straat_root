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
        <h1 class="overview_title"><?php echo $ads ?></h1>
        <div id="top">
            <section>
                <a href="./index.php?page=newad"><button class="new_item" id="new_ad" name="new_ad"><?php echo $new_ad ?></button></a>
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
                <ul><?php echo linked_ads_limited(get_ads($max_shown_ads_per_page), $max_shown_ads_per_page); ?></ul>
            </section>
        </div>
    </div>
</div>
<script src="./js/index.js"></script>
</body>
</html>