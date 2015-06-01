<?php
function projects_item($id, $title, $date, $location, $description)
{
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($location == null) $location = "";
    if($description == null) $description = "";
    return array("id" => $id, "title" => $title, "date" => $date, "location" => $location, "description" => $description);
}

function events_item($id, $title, $date, $location, $description)
{
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($location == null) $location = "";
    if($description == null) $description = "";
    return array("id" => $id, "title" =>$title, "date" => $date, "location" => $location, "description" =>$description);
}

function news_item($date, $img, $name, $reaction)
{
    if($date == null) $date = "";
    if($img == null) $img = "";
    if($name == null) $name = "";
    if($reaction == null) $reaction = "";
    return array("date" => $date, "img" => $img, "name" => $name, "reaction" => $reaction);
}

function ads_item($id,$img, $title, $date, $text)
{
    if($img == null) $img = "";
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($text == null) $text = "";
    return array($id,$img, $title, $date, $text);
}

function articles_item($id, $title, $date, $category, $text)
{
    if($title == null) $title = "";
    if($date == null) $date = "";
    if($category == null) $category = "";
    if($text == null) $text = "";
    return array($id,$title, $date, $category, $text);
}

function articles_item_full($id, $title, $description, $date, $user, $category)
{
    if($id == null) $id = "";
    if($title == null) $title = "";
    if($description == null) $description = "";
    if($date == null) $date = "";
    if($user == null) $user = "";
    if($category == null) $category = "";
    return array($id, $title, $description, $date, $user, $category);
}

function comments_item($date, $img, $name, $reaction, $delete)
{
    if($date == null) $date = "";
    if($img == null) $img = "";
    if($name == null) $name = "";
    if($reaction == null) $reaction = "";
    if($delete == null) $delete = "";
    return array($date, $img, $name, $reaction, $delete);
}

function foto_item($id, $url, $delete)
{
    if($url == null) $url = "";
    return array($id,$url,$delete);
}

function gebruiker_item($id,$gebruikersnaam)
{
    if($gebruikernaam == null) $gebruikersnaam = "";
    return array($id,$gebruikersnaam);
}

function project_detail($id, $title, $description, $date, $time, $city, $street, $website, $name, $category){
    if($title == null) $title = "";
    if($description == null) $description = "";
    if($date == null) $date = "";
    if($time == null) $time = "";
    if($city == null) $city = "";
    if($street == null) $street = "";
    if($website == null) $website = "";
    if($name == null) $name = "";
    if($category == null) $category = "";
    return array("id" => $id, "title" => $title, "description" => $description, "date" => $date, "time" =>$time, "city" => $city, "street" => $street, "website" => $website, "name" => $name, "category" => $category);
}

function event_details($id,$title,$gebruikersnaam,$startdate,$enddate,$starttime,$location,$category,$website,$description)
{
    if($title == null) $title = "";
    if($gebruikersnaam == null) $gebruikersnaam = "";
    if($startdate == null) $startdate = "";
    if($enddate == null) $enddate = "";
    if($starttime == null) $starttime = "";
    if($location == null) $location = "";
    if($category == null) $category = "";
    if($website == null) $website = "";
    if($description == null) $description = "";
    return array($id,$title,$gebruikersnaam,$startdate,$enddate,$starttime,$location,$category,$website,$description);
}

function citysList($id, $city){
    if($city == null) $city = "";
    return array("id" => $id, "city" => $city);
}
?>