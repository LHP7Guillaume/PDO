<?php
require_once '../models/mName.php';

 

if (isset($_GET["results"])) {
    $mnameObj = new Mname();
    $mnameArray = $mnameObj->nameMname();

    
}