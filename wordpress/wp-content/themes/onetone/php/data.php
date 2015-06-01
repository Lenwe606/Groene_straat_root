<?php include_once("./inc/php/layout_functions.php"); ?>
<?php
    $newsArray = array();
    $eventsArray = array();
    $projectsArray = array();
    $project_categoryArray = array();
    $event_categoryArray = array();
    $citys = array();

    $newsArray[] = news_item("Datum", "./img/temp.jpg", "Admin", "De reactie tekst");
    $newsArray[] = news_item("Datum", "./img/temp.jpg", "Admin", "De reactie tekst");
    $newsArray[] = news_item("Datum", "./img/temp.jpg", "Admin", "De reactie tekst");
    $newsArray[] = news_item("Datum", "./img/temp.jpg", "Admin", "De reactie tekst");

    $eventsArray[] = events_item("Titel event", "Datum", "Plaats", "Omschrijving");
    $eventsArray[] = events_item("Titel event", "Datum", "Plaats", "Omschrijving");
    $eventsArray[] = events_item("Titel event", "Datum", "Plaats", "Omschrijving");
    $eventsArray[] = events_item("Titel event", "Datum", "Plaats", "Omschrijving");

    $projectsArray[] = projects_item("Titel project", "Datum", "Plaats", "Omschrijving");
    $projectsArray[] = projects_item("Titel project", "Datum", "Plaats", "Omschrijving");
    $projectsArray[] = projects_item("Titel project", "Datum", "Plaats", "Omschrijving");
    $projectsArray[] = projects_item("Titel project", "Datum", "Plaats", "Omschrijving");

    $project_categoryArray[] = "Planten en decoratie";
    $project_categoryArray[] = "Grote werkzaamheden";
    $project_categoryArray[] = "Vrijwillegerswerk";

    $event_categoryArray[] = "Buurtfeest";
    $event_categoryArray[] = "Bijeenkomst";
    $event_categoryArray[] = "Etentje";

    $citys[] = "Kortrijk";
    $citys[] = "Waregem";
?>