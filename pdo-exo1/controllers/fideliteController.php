<?php
require_once '../models/fidelite.php';



if (isset($_GET["results"])) {
    $fideliteObj = new Fidelite();
    $fideliteArray = $fideliteObj->namefidelite();

    
}