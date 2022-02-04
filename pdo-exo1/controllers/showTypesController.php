<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Shows.php';



if (isset($_GET["results"])) {
    $showsObj = new Shows();
    $showsArray = $showsObj->nameShowTypes();

    
}