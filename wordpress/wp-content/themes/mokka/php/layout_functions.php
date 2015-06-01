<?php include_once("name.inc.php"); ?>
<?php
function news($array)
{
    news_limitid($array, count($array));
}

function news_limitid($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li>
            <section class="news_section_info">
                <p class="news_date"><?php echo $array[$i]["date"]; ?></p>

                <p class="news_img"><img src="<?php echo $array[$i]["img"]; ?>"></p>

                <p class="news_name"><?php echo $array[$i]["name"]; ?></p>
            </section>
            <section class="news_section_reaction">
                <p class="news_reaction"><?php echo $array[$i]["reaction"]; ?></p>
            </section>
        </li>
    <?php
    }
}

function events($array)
{
    events_limited($array, count($array));
}

function events_limited($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li>
            <a href="./index.php?page=eventdetail&id=<?php echo $array[$i]["id"]; ?>">
                <p class="event_title"><?php echo $array[$i]["title"]; ?></p>

                <p class="event_date"><?php echo $array[$i]["date"]; ?></p>

                <p class="event_location"><?php echo $array[$i]["location"]; ?></p>

                <p class="event_description"><?php echo $array[$i]["description"]; ?></p>
            </a>
        </li>
    <?php   
    }
}

function projects($array)
{
    projects_limited($array, count($array));
}

function projects_limited($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li>
            <a href="./index.php?page=projectdetail&id=<?php echo $array[$i]["id"]; ?>">
                <p class="project_title"><?php echo $array[$i]["title"]; ?></p>

                <p class="project_date"><?php echo $array[$i]["date"]; ?></p>

                <p class="project_location"><?php echo $array[$i]["location"]; ?></p>

                <p class="project_description"><?php echo $array[$i]["description"]; ?></p>
            </a>
        </li>
    <?php
    }
}

function fotos($array)
{
    for($i = 0;$i<count($array);$i++)
    {?>
        <p><img src="/wp-content/themes/mokka-child/img/<?php echo $array[$i][1] ?>"></p>
    <?php
    }
}

function project_category($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <li><a href=""><?php echo $array[$i]; ?></a></li>
    <?php
    }
}

function project_category_options($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <option><?php echo $array[$i]; ?></option>
    <?php
    }
}

function citys($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <option value="<?php echo $array[$i]["city"]; ?>"><?php echo $array[$i]["city"]; ?></option>
    <?php
    }
}

function event_category($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <li><a href=""><?php echo $array[$i]; ?></a></li>
    <?php
    }
}

function event_category_options($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <option><?php echo $array[$i]; ?></option>
    <?php
    }
}

function project_options($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <option><?php echo $array[$i][0]; ?></option>
    <?php
    }
}

function event_options($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <option><?php echo $array[$i][0]; ?></option>
    <?php
    }
}

function linked_events_limited($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li class="offset">
            <a href="./index.php?page=eventdetail&id=<?php echo $array[$i]["id"]; ?>">
                <p class="event_title"><?php echo $array[$i]["title"]; ?></p>

                <p class="event_date"><?php echo $array[$i]["date"]; ?></p>

                <p class="event_location"><?php echo $array[$i]["location"]; ?></p>

                <p class="event_description"><?php echo $array[$i]["description"]; ?></p>
            </a>
        </li>
    <?php
    }
}

function ads_limited($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li><a href="./index.php?page=addetail&id=<?php echo $array[$i][0]; ?>">
            <p class="ads_img"><img src="<?php echo $array[$i][1]; ?>"/></p>

            <p class="ads_name"><?php echo $array[$i][2]; ?></p>

            <p class="ads_date"><?php echo $array[$i][3]; ?></p>

            <p class="ads_linked_name"><?php echo $array[$i][4]; ?></p>

        </a></li>
    <?php
    }
}

function articles_limited($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li><a href="./index.php?page=articledetail&id=<?php echo $array[$i][0]; ?>">
            <p class="article_name"><?php echo $array[$i][1]; ?></p>

            <p class="article_date"><?php echo $array[$i][2]; ?></p>

            <p class="article_category"><?php echo $array[$i][3]; ?></p>

            <p class="article_linked_value"><?php echo $array[$i][4]; ?></p>
            </a>
        </li>
    <?php
    }
}

function comments_limited($array, $amount)
{
    $max = 0;
    if ($amount > count($array)) $max = count($array);
    else $max = $amount;
    for ($i = 0; $i < $max; $i++) {
        ?>
        <li>
            <div class="comment_info">
                <p class="comment_date"><?php echo $array[$i][0]; ?></p>

                <p class="comment_img"><img src="<?php echo $array[$i][1]; ?>"></p>

                <p class="comment_name"><?php echo $array[$i][2]; ?></p>
            </div>
            <p class="comment_reaction"><?php echo $array[$i][3]; ?></p>
            <button><?php echo $array[$i][4]; ?></button>
        </li>
    <?php
    }
}

function members($array)
{
    for ($i = 0; $i < count($array); $i++) {
        ?>
        <li><a href="./index.php?page=memberdetail&id=<?php echo $array[$i][0]; ?>"><?php echo $array[$i][1]; ?></a></li>
    <?php
    }
}

?>