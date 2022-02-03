<?php
require_once '../models/Clients.php';

 

if (isset($_GET["results"])) {
    $clientsObj = new Clients();
    $clientsArray = $clientsObj->nameClients();

    
}
