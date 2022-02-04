<?php

var_dump($_POST);

require_once '../config.php';
require_once '../models/DataBase.php';
require_once '../models/patient.php';

$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/u";
$regexPseudo = "/^[0123456789a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð,.'-]{2,30}$/u";
$arrayError = [];



if (!empty($_POST)) {

    if (isset($_POST["nom"])) {
        if (empty($_POST["nom"])) {
            $arrayError["nom"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_POST["nom"])) {
            $arrayError["nom"] = "Format invalide";
        }
    }

    if (isset($_POST["prenom"])) {
        if (empty($_POST["prenom"])) {
            $arrayError["prenom"] = "Veuillez saisir votre prénom";
        } elseif (!preg_match($regexNom, $_POST["prenom"])) {
            $arrayError["prenom"] = "Format invalide";
        }
    }

    if (isset($_POST["birthDate"])) {
        if (empty($_POST["birthDate"])) {
            $arrayError["birthDate"] = "Veuillez saisir la date de naissance";
        } elseif (!preg_match($regexNom, $_POST["birthDate"])) {
            $arrayError["birthDate"] = "Format invalide";
        }
    }


    if (isset($_POST["phone"])) {
        if (empty($_POST["phone"])) {
            $arrayError["phone"] = "Veuillez saisir votre numéro de telephone";
        } elseif (!preg_match($regexNom, $_POST["phone"])) {
            $arrayError["phone"] = "Format invalide";
        }
    }


    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $arrayError["mail"] = "Veuillez saisir votre Mail";
        } elseif (!preg_match($regexNom, $_POST["mail"])) {
            $arrayError["mail"] = "Format invalide";
        }
    }
}
