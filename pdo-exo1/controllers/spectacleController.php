<?php
require_once '../models/spectacle.php';



if (isset($_GET["results"])) {
    $spectacleObj = new Spectacle();
    $spectacleArray = $spectacleObj->nameSpectacle();

    
}