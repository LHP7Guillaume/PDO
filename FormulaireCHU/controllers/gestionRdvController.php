<?php

require '../config.php';
require '../models/DataBase.php';
require '../models/Patient.php';
require '../models/appointment.php'; 

$patientObj = new Appointments;
$patients = $patientObj->getAllRdv();

// $patientObj = new Patients;
// $patients = $patientObj->GetAllPatient();