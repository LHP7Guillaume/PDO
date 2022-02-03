<?php
require_once '../models/ultimate.php';



if (isset($_GET["results"])) {
    $ultimateObj = new Ultimate();
    $ultimateArray = $ultimateObj->nameUltimate();

    
}