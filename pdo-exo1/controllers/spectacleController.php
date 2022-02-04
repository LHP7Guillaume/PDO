<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Shows.php';



if (isset($_GET["results"])) {
    $spectacleObj = new Shows();
    $spectacleArray = $spectacleObj->getInfoShows();

    
}