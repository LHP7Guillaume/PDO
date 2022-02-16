<?php

require '../config.php';
require '../models/DataBase.php';
require '../models/appointment.php'; 



if (isset($_POST["deleteRdv"])) {
    $id = htmlspecialchars(trim($_POST["idDeleteRdv"]));
    $appointmentObj = new Appointments();
    $appointmentInfo = $appointmentObj->deleteRdv($id);
}

$appointmentObj = new Appointments;
$appointments = $appointmentObj->getAllRdv();

