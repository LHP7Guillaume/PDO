<?php
require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Clients.php';



if (isset($_GET["results"])) {
    $fideliteObj = new Clients();
    $fideliteArray = $fideliteObj->getClientsWithCardType(1, 4);

    
}