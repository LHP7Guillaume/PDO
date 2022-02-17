<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php';
$arrayError = [];
var_dump($_POST);

if (isset($_POST["idRdv"]) || isset($_POST["modifyBtnRdv"])) {
    $appointment = new Appointments;
    if (isset($_POST["modifyBtnRdv"])) {
        $rdv = $appointment->getOneRdv($_POST["modifyBtnRdv"]);
    } else {
        $rdv = $appointment->getOneRdv($_POST["idRdv"]);
    }

    //$_POST["rdvDate"]="toto";

    $dateHour = $rdv["dateHour"];
    $date = explode(" ", $dateHour)[0];
    $date = date("d/m/Y", strtotime($date));
    var_dump($date);

    $time = explode(" ", $dateHour)[1];
    $time = explode(":", $time);
    $time = $time[0] . ":" . $time[1];
    var_dump($time);
}

if (isset($_POST['updateBtnRdv'])) {

    if (empty($_POST["rdvDate"])) {
        $arrayError["rdvDate"] = "Format invalide";
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



    if (count($arrayError) == 0) {
        // strtoupper = en majuscule / ucwords = 1ere lettre en majuscule

        $rdvDate = htmlspecialchars(trim($_POST['rdvDate']));
        $rdvTime = htmlspecialchars(trim($_POST['rdvTime']));
        $id = htmlspecialchars(trim($_POST['idPatient']));
        var_dump($rdvDate, $rdvTime);
        $appointment = new Appointments();
        $appointment->modifyAppointment($id, $dateHour);
        $patientInfo = $patientObj->getOnePatient($id);
        $modifyPatientOk = 1;
    }
}
