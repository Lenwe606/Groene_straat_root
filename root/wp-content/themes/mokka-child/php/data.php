<?php include_once("layout_functions.php"); ?>
<?php
    $adsArray = array();
    $articlesArray = array();
    $commentsArray = array();
    $membersArray = array();

    $adsArray[] = ads_item("http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Titel zoekertje", "Datum", $ads_linked, "derp");
    $adsArray[] = ads_item("http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Titel zoekertje", "Datum", $ads_linked, "derp");

    $articlesArray[] = articles_item("Titel Artikel", "Datum", "Category", $articles_linked, "derp");
    $articlesArray[] = articles_item("Titel Artikel", "Datum", "Category", $articles_linked, "derp");

    $commentsArray[] = comments_item("Datum", "http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Username", "De reactie tekst", $detail_delete_comment);
    $commentsArray[] = comments_item("Datum", "http://localhost:8080/wp-content/uploads/2015/05/temp.jpg", "Username", "De reactie tekst", $detail_delete_comment);

    for($i = 1; $i < 8; $i++){
        $membersArray[] = "Lid ".$i;
    }

    $project_owner = true;
?>