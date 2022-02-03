<?php
require_once '../models/showTypes.php';



if (isset($_GET["results"])) {
    $showsObj = new ShowTypes();
    $showsArray = $showsObj->nameShowTypes();

    
}