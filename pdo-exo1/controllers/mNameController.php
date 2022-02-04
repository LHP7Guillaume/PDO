<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Clients.php';

 

if (isset($_GET["results"])) {
    $mnameObj = new Clients();
    $mnameArray = $mnameObj->searchClient('M');

    
}