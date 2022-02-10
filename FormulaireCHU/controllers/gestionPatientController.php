<?php

require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Patient.php';

if (isset($_POST["deletePatient"])) {
    $id = htmlspecialchars(trim($_POST["idDeletePatient"]));
    $patientObj = new Patients();
    $patientInfo = $patientObj->deletePatient($id);
}

$gestionPatient = new Patients();
$gestionArray = $gestionPatient->getAllPatient();


