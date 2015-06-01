<?php include_once("php/include.inc.php"); ?>
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
        <form id="new" method="post">
            <h1><?php echo $new_project; ?></h1>
            <section id="label">
                <p><label for="title"><?php echo $event_title; ?></label></p>
                <p><label for="start_date"><?php echo $event_start_date; ?></label></p>
                <p><label for="end_date"><?php echo $event_end_date; ?></label></p>
                <p><label for="start_time"><?php echo $event_start_time; ?></label></p>
                <p><label for="category"><?php echo $event_category; ?></label></p>
                <p><label for="website"><?php echo $event_website; ?></label></p>
                <p class="textarea"><label for="description"><?php echo $project_description; ?></label></p>
                <p><label for="linked_project"><?php echo $event_linked_project; ?></label></p>
                <p><label for="img1"><?php echo $img; ?></label></p>
                <p><label for="img2"><?php echo $img; ?></label></p>
                <p><label for="img3"><?php echo $img; ?></label></p>
                <p><label for="img4"><?php echo $img; ?></label></p>
                <p><label for="img5"><?php echo $img; ?></label></p>
            </section>
            <section id="field">
                <p><input type="text" placeholder="<?php echo $event_title; ?>" id="title" name="title"/></p>
                <p><input type="text" placeholder="<?php echo $event_start_date; ?>" id="start_date" name="start_date"/></p>
                <p><input type="text" placeholder="<?php echo $event_end_date; ?>" id="end_date" name="end_date"/></p>
                <p><input type="text" placeholder="<?php echo $event_start_time; ?>" id="start_time" name="start_time"/></p>
                <select id="cboCategory" name="category" class="cbo">
                    <?php echo event_category_options(get_event_category()); ?>
                </select>

                <p><input type="text" placeholder="<?php echo $event_website; ?>" id="website" name="website"/></p>

                <textarea placeholder="<?php echo $event_description; ?>" id="description" name="description"></textarea>

                <select id="cboProjects" name="linked_project" class="cbo">
                    <?php echo event_options($eventsArray); ?>
                </select>

                <div class="img">
                    <p><input type="text" placeholder="<?php echo $img; ?>" id="img1" name="img1"/></p>
                    <p><button value="<?php echo $button_img; ?>"><?php echo $button_img; ?></button></p>
                </div>

                <div class="img">
                    <p><input type="text" placeholder="<?php echo $img; ?>" id="img2" name="img2"/></p>
                    <p><button value="<?php echo $button_img; ?>"><?php echo $button_img; ?></button></p>
                </div>

                <div class="img">
                    <p><input type="text" placeholder="<?php echo $img; ?>" id="img3" name="img3"/></p>
                    <p><button value="<?php echo $button_img; ?>"><?php echo $button_img; ?></button></p>
                </div>

                <div class="img">
                    <p><input type="text" placeholder="<?php echo $img; ?>" id="img4" name="img4"/></p>
                    <p><button value="<?php echo $button_img; ?>"><?php echo $button_img; ?></button></p>
                </div>

                <div class="img">
                    <p><input type="text" placeholder="<?php echo $img; ?>" id="img5" name="img5"/></p>
                    <p><button value="<?php echo $button_img; ?>"><?php echo $button_img; ?></button></p>
                </div>
            </section>

            <div id="formButton">
                <p><button value="<?php echo $reset; ?>"><?php echo $reset; ?></button></p>
                <p><input type="submit" value="<?php echo $save; ?>"/></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>