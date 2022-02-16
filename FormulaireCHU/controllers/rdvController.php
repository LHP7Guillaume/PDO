<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php';

$arrayError = [];

$addRdvOk = false;


$appointmentObj = new Appointments;
$appointments = $appointmentObj->getAllRdv();

var_dump($_POST);
if (!empty($_POST)) {

    if (!empty($_POST["rdvDate"]) && !empty($_POST["rdvTime"]) && !empty($_POST["nameRDV"])) {

        $date = htmlspecialchars(trim($_POST["rdvDate"]));
        $time = htmlspecialchars(trim($_POST["rdvTime"]));
        $idPatient = intval(htmlspecialchars(trim($_POST["nameRDV"])));

        $dateHour = $date . " " . $time;
        $dateTime = strtotime($dateHour);

        var_dump(time(), ($dateHour), ($dateTime), ($idPatient));

        if (time() >= $dateTime) {
            $arrayError["rdvDate"] = "Le rdv ne peut pas etre pris avant la date actuelle";
        }


        if (count($arrayError) == 0) {
            $appointmentObj = new Appointments;
            $appointmentObj->recordAppointments($dateHour, $idPatient);

            $addRdvOk = true;
        }
    }
}
