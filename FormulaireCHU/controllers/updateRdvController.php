<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php';
$arrayError = [];

$modifyRdvOk = 0;

$displayType = ((!isset($_POST["modifyBtnRdv"]) || (empty($_POST["modifyBtnRdv"])))) || count($arrayError) != 0  ? "text" : "date";


if (isset($_POST["idRdv"]) || isset($_POST["modifyBtnRdv"])) {
    $appointment = new Appointments;
    if (isset($_POST["modifyBtnRdv"])) {
        $rdv = $appointment->getOneRdv($_POST["modifyBtnRdv"]);
    } else {
        $rdv = $appointment->getOneRdv($_POST["idRdv"]);
    }

    $dateHour = $rdv["dateHour"];
    $date = explode(" ", $dateHour)[0];
    $date = date("d/m/Y", strtotime($date));

    $displayDate = ((!isset($_POST["rdvDate"]) || (empty($_POST["rdvDate"])))) ? $date : htmlspecialchars($_POST["rdvDate"]);

    $time = explode(" ", $dateHour)[1];
    $time = explode(":", $time);
    $time = $time[0] . ":" . $time[1];

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
        $rdvId = htmlspecialchars(trim($_POST['idRdv']));
        $patientId = htmlspecialchars(trim($_POST['idPatient']));
        var_dump($rdvDate, $rdvTime, $rdvId);
        $appointment = new Appointments();
        $appointment->modifyAppointment($rdvId, $dateHour);
        $rdv = $appointment->getOneRdv($rdvId);

        $dateHour = $rdv["dateHour"];
        $displayDate = explode(" ", $dateHour)[0];
        $displayDate = date("d/m/Y", strtotime($date));

        $modifyRdvOk = 1;
    }
}
