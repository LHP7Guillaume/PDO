<?php

require '../config.php';
require '../models/DataBase.php';
require '../models/appointment.php'; 


$deleteRdvOk = 0;

if (isset($_POST["deleteRdv"])) {
    $id = htmlspecialchars(trim($_POST["idDeleteRdv"]));
    $appointmentObj = new Appointments();
    $appointmentInfo = $appointmentObj->deleteRdv($id);

    $deleteRdvOk = 1;
}

$appointmentObj = new Appointments;
$appointments = $appointmentObj->getAllRdv();

