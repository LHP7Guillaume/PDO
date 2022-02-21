<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php';

$arrayError = [];

$addRdvOk = false;

$appointmentObj = new Appointments;
$appointments = $appointmentObj->getAllRdv();

if (!empty($_POST)) {

    if (!isset($_POST["idPatient"])) {
        $arrayError["idPatient"] = "Veuillez selectionner un patient ";
    }

    if (empty($_POST["rdvDate"])){
        $arrayError["rdvDate"] = "Veuillez selectionner une date de rendez-vous ";
    }

    if (empty($_POST["rdvTime"])){
        $arrayError["rdvTime"] = "Veuillez selectionner un horaire de rendez-vous ";
    }

    if (!empty($_POST["rdvDate"]) && !empty($_POST["rdvTime"]) && !empty($_POST["idPatient"])) {

        $date = htmlspecialchars(trim($_POST["rdvDate"]));
        $time = htmlspecialchars(trim($_POST["rdvTime"]));
        $idPatient = intval(htmlspecialchars(trim($_POST["idPatient"])));

        $dateHour = $date . " " . $time;
        $dateTime = strtotime($dateHour);

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

