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
        <?php
        if (!empty($_GET["id"])) {
            $detail = get_detail_project(($_GET["id"]));
        }
        ?>
        <h1 class="overview_title"><?php echo $detail[0]["title"]; ?></h1>
        <section class="info">
            <h2 class="section_name"><?php echo $detail_general; ?></h2>

            <p class="item_name"><?php echo $detail_owner; ?></p>

            <p class="item_value"><?php echo $detail[0]["name"]; ?></p>

            <p class="item_name"><?php echo $detail_creation_date; ?></p>

            <p class="item_value"><?php echo $detail[0]["date"]; ?></p>

            <p class="item_name"><?php echo $detail_location; ?></p>

            <p class="item_value"><?php echo $detail[0]["street"]; ?></p>

            <p class="item_name"><?php echo $detail_category; ?></p>

            <p class="item_value"><?php echo $detail[0]["category"]; ?></p>

            <p class="item_name"><?php echo $detail_website; ?></p>

            <p class="item_value"><?php echo $detail[0]["website"]; ?></p>

            <p class="item_name"><?php echo $detail_description; ?></p>

            <p class="item_value"><?php echo $detail[0]["description"]; ?></p>
            ?>
        </section>
        <section class="buttons">
            <?php if ($project_owner) { ?>
                <a href="./index.php?page=editproject&id=<?php echo $_GET["id"]; ?>"><button value="<?php echo $detail_edit; ?>"><?php echo $detail_edit; ?></button></a>
                <button value="<?php echo $detail_delete; ?>"><?php echo $detail_delete; ?></button>
            <?php } else { ?>
                <button value="<?php echo $detail_register; ?>"><?php echo $detail_register; ?></button>
            <?php } ?>
        </section>
        <section class="images">
            <h2 class="section_name"><?php echo $detail_images; ?></h2>

            <?php echo fotos($detail[1]); ?>
        </section>
        <section class="members">
            <h2 class="section_name"><?php echo $detail_members; ?></h2>
            <ul><?php echo members($detail[2]); ?></ul>
        </section>
        <section id="events">
            <h2 class="section_name"><?php echo $detail_linked_events; ?></h2>
            <ul><?php echo linked_events_limited($detail[3], $detail_max_shown_events); ?></ul>
            <?php
            if (count($detail[3]) > $detail_max_shown_events) {
                ?>
                <p class="more_items"><a href=""><?php echo $detail_more_events; ?></a></p>
            <?php
            }
            ?>
        </section>
        <section class="ads">
            <h2 class="section_name"><?php echo $detail_linked_ads; ?></h2>
            <ul><?php echo ads_limited($detail[4], $detail_max_shown_ads); ?></ul>
            <?php
            if (count($detail[4]) > $detail_max_shown_ads) {
                ?>
                <p class="more_items"><a href=""><?php echo $detail_more_ads; ?></a></p>
            <?php
            }
            ?>
        </section>
        <section class="articles">
            <h2 class="section_name"><?php echo $detail_linked_articles; ?></h2>
            <ul><?php echo articles_limited($detail[5], $detail_max_shown_articles); ?></ul>
            <?php
            if (count($detail[5]) > $detail_max_shown_articles) {
                ?>
                <p class="more_items"><a href=""><?php echo $detail_more_article; ?></a></p>
            <?php
            }
            ?>
        </section>

        <section class="comments">
            <ul><?php echo comments_limited($detail[6], $detail_max_shown_comments); ?></ul>
            <?php
            if (count($commentsArray) > $detail_max_shown_comments) {
                ?>
                <p class="more_items"><a href=""><?php echo $detail_more_comment; ?></a></p>
            <?php
            }
            ?>
        </section>

        <section class="comment">
            <form method="post">
                <p><?php echo $detail_place_comment; ?></p>
                <textarea></textarea>
                <input type="submit" value="<?php echo $detail_place_comment_button; ?>"/>
            </form>
        </section>

    </div>
</div>
</body>
</html>