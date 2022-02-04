<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Clients.php';



if (isset($_GET["results"])) {
    $twentyClientsObj = new Clients();
    $twentyClientsArray = $twentyClientsObj->getSomeClients(20);

    
}