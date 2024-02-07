<?php
require_once("database.php");
$templateParams["titolo"] = "Search event";
$templateParams["contenuto"] = "view/search-view.php";
$templateParams["contenutoSearch"] = "view/searchEvent-view.php";
if(isset($_POST['search'])){
    if(count($dbh->searchEventFromName($_POST['search'])) > 0){
        $templateParams["risultatoSearchEvent"] = $dbh->searchEventFromName($_POST['search']);
    }
    else{
        if(count($dbh->getUsernameFromUser($_POST['search'])) > 0){
            $templateParams["risultatoSearchEvent"] = [];
            foreach(($dbh->getUsernameFromUser($_POST['search'])) as $user){
                if((count($dbh->getEventFromUser($user['Username'])) > 0)){
                    foreach($dbh->getEventFromUser($user['Username']) as $event){
                        array_push($templateParams["risultatoSearchEvent"], $event);
                    }
                }
            }
        }
    }
}
require("view/base.php");
?>