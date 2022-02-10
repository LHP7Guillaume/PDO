<?php

require_once '../controllers/infoPatientController.php';


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <a href="https://icons8.com/icon/MS2XYm4irEPy/user"></a>

    <title>Informations Patients</title>
</head>

<body class="">


    <header class="mb-5">

        <div class="row">
            <a class="col-lg btn btn-outline-secondary fs-3 round-0" href="home.php?results=home">Accueil</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="addPatient.php?results=addPatient">Ajout d'un patient</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="gestionPatient.php?results=gestionPatient">Gestion des patients</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="">Prise de rendez-vous</a>
        </div>
    </header>


    <div class="container mycontainer col-8 mb-5 mt-5 shadow p-5">

        <h1 class="text-center mt-5">Informations patients</h1>

        <?php if ($modifyPatientOk == true) { ?>
            <p class="text-center text-success">
                La modification a été effectué avec succès.
            </p>
        <?php } ?>

        <?php
        // Nous mettons en place une condition pour s'assurer que nous avons selectionné un patient avec le bouton +d'info
        if (isset($patientInfo)) { ?>
            <form class="container col-7" action="" method="POST" novalidate>
                <div class="mb-3">
                    <label for="nom" class="form-label mt-3">Nom : </label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= $patientInfo['lastname'] ?>" name="nom" type="text" class="form-control" id="nom" placeholder="Ex : Dupont..." <?= (isset($_POST["modifyBtn"]) || count($arrayError) != 0) ? "" : 'disabled' ?>>

                    <label for="prenom" class="form-label mt-3">Prénom : </label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? "";
                        ?>
                    </span>
                    <input value="<?= $patientInfo['firstname'] ?>" name=" prenom" type="text" class="form-control" id="prenom" placeholder="Ex : Jean..." <?= (isset($_POST["modifyBtn"]) || count($arrayError) != 0) ? "" : 'disabled' ?>>

                    <label for="birthDate" class="form-label mt-3">Date de naissance : </label><span class="text-danger">
                        <?=
                        $arrayError["birthDate"] ?? "";
                        ?>
                    </span>
                    <input value="<?= $patientInfo['birthdate'] ?>" name=" birthDate" type="date" class="form-control" id="birthDate" placeholder="24/12/2021" <?= (isset($_POST["modifyBtn"]) || count($arrayError) != 0) ? "" : 'disabled' ?>>

                    <label for="phone" class="form-label mt-3">N° de téléphone : </label><span class="text-danger">
                        <?=
                        $arrayError["phone"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= $patientInfo['phone'] ?>" name="phone" type="tel" class="form-control" id="phone" placeholder="061256XXXX" <?= (isset($_POST["modifyBtn"]) || count($arrayError) != 0) ? "" : 'disabled' ?>>

                    <label for="mail" class="form-label mt-3">Adresse mail : </label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span>
                    <input type="hidden" name="oldMail" value="<?= $patientInfo['mail'] ?>">
                    <input value="<?= $patientInfo['mail'] ?>" name="mail" type="email" class="form-control" id="mail" placeholder="Ex : hopital@gmail.com" <?= (isset($_POST["modifyBtn"]) || count($arrayError) != 0) ? "" : 'disabled' ?>>

                </div>

                <div class="text-center mt-4">

                    <a href="gestionPatient.php" class="btn btn-outline-secondary">Retour gestions des patients</a>
                    <input type="hidden" name="idPatient" value="<?= $patientInfo['id'] ?>">

                    <?php if (!isset($_POST["modifyBtn"]) && count($arrayError) == 0) { ?>
                        <button type="submit" name="modifyBtn" class="btn btn-outline-primary">Modifier la fiche du patient</button>
                    <?php } else { ?>
                        <button type="submit" name="updateBtn" class="btn btn-outline-success">Enregistrer les modifications</button>
                    <?php   } ?>
                </div>
            </form>

        <?php   } else { ?>
            <div class="text-center">
                <p>Veuillez selectionner un patient s'il vous plait</p>
                <a class="btn btn-secondary" href="gestionPatient.php">Listes des patients</a>
            </div>
        <?php   } ?>

    </div>


    <footer class="mt-5 ">
        <div>
            <h2 class="text-center fs-6 p-4">@ LaManu 2022</h2>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>