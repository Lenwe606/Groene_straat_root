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
                <p><label for="title"><?php echo $project_title; ?></label></p>
                <p><label for="location"><?php echo $project_location; ?></label></p>
                <p><label for="category"><?php echo $project_category; ?></label></p>
                <p class="textarea"><label for="description"><?php echo $project_description; ?></label></p>
                <p><label for="img1"><?php echo $img; ?></label></p>
                <p><label for="img2"><?php echo $img; ?></label></p>
                <p><label for="img3"><?php echo $img; ?></label></p>
                <p><label for="img4"><?php echo $img; ?></label></p>
                <p><label for="img5"><?php echo $img; ?></label></p>
            </section>
            <section id="field">
                <p><input type="text" placeholder="<?php echo $project_title; ?>" id="title" name="title"/></p>
                <p><input type="text" placeholder="<?php echo $project_location; ?>" id="location" name="location"/></p>
                <select id="cboCategory" name="category" class="cbo">
                    <?php echo project_category_options(get_project_category()); ?>
                </select>
                <textarea placeholder="<?php echo $project_description; ?>" id="description" name="description"></textarea>

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