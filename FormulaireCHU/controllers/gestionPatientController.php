<?php

require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/Patient.php';

$deletePatientOk = 0;

if (isset($_POST["deletePatient"])) {
    $id = htmlspecialchars(trim($_POST["idDeletePatient"]));
    $patientObj = new Patients();
    $patientInfo = $patientObj->deletePatient($id);

    $deletePatientOk = 1;

}

$gestionPatient = new Patients();
$gestionArray = $gestionPatient->getAllPatient();


