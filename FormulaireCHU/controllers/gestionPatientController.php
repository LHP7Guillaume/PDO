<?php

require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Patient.php';


$gestionPatient = new Patients();
$gestionArray = $gestionPatient->getAllPatient();
