<?php
require_once '../models/twentyClients.php';



if (isset($_GET["results"])) {
    $twentyClientsObj = new TwentyClients();
    $twentyClientsArray = $twentyClientsObj->nameTwentyClients();

    
}