<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php';


if (isset($_POST["idRdv"])) {
    $appointment = new Appointments;
    $rdv = $appointment->getOneRdv($_POST["idRdv"]);

    $dateHour = $rdv["dateHour"];
    $date = explode(" ", $dateHour)[0];
    $date = date("d/m/Y", strtotime($date));
    var_dump($date);
}



