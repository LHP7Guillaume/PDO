<?php
require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php';




$patientObj = new Patients;
$patients = $patientObj->GetAllPatient();



if (isset($_POST["newRdv"])) {
    $id = htmlspecialchars(trim($_POST["nameRDV"]));
    $date = htmlspecialchars(trim($_POST["rdvDate"]));
    $time = htmlspecialchars(trim($_POST["rdvTime"]));
    $dateHour = $date . " " . $time;
    var_dump($id, $dateHour);
    $appointmentObj = new Appointments;
    $appointmentObj->recordAppointments($dateHour, $id);
}