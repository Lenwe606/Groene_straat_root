<?php include_once("./inc/php/include.inc.php"); ?>
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
        <h1 class="overview_title"><?php echo $projects ?></h1>
        <div id="top">
            <section>
                <button class="new_item"><?php echo $new_project ?></button>
                <input value="<?php echo $search_filter ?>" class="search_input"/>
            </section>
        </div>
        <div id="bottom">
            <section id="filter">
                <p class="section_header"><?php echo $city_filter ?></p>
                <select id="cboSteden">
                    <?php echo citys($citys); ?>
                </select>
                <p class="section_header"><?php echo $category_filter ?></p>
                <ul><?php echo project_category($project_categoryArray); ?></ul>
            </section>
            <section id="items">
                <ul><?php echo projects_limited($projectsArray, $max_shown_projects_per_page); ?></ul>
            </section>
        </div>
    </div>
</div>
</body>
</html>