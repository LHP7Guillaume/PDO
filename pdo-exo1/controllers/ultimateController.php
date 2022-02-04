<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Clients.php';



if (isset($_GET["results"])) {
    $ultimateObj = new Clients();
    $ultimateArray = $ultimateObj->getClientsUltimate();

    
}