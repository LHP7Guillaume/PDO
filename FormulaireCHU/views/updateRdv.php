<?php

require_once '../controllers/updateRdvController.php';
require_once '../controllers/gestionPatientController.php';



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
    <!-- captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>rdv</title>
</head>

<body>
    <header class="mb-5">

        <div class="row">
            <a class="col-lg btn btn-outline-secondary fs-3" href="home.php?results=home">Accueil</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="gestionPatient.php?results=gestionPatient">Gestion des patients</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="infoPatient.php?results=infoPatient">Informations patients</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="addPatient.php?results=addPatient">Ajout un patient</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="rdv.php?results=rdv">Ajout d'un Rdv</a>
        </div>
    </header>


    <div class="container shadow p-5">

        <h1 class="mt-4 mb-4 text-center pb-4">Prise de rendez-vous des patients de l'hopital Gouzou</h1>

        <?php if ($rdv) { ?>
           
            <form action="" method="POST" novalidate>
                <div class="mb-3">


                    <div class="input-group mb-3">

                        <label class="input-group-text" for="inputGroupSelect01">Mr / Mme</label>

                        <input value="<?= $rdv['lastname'] . " " . $rdv['firstname'] ?>" name="nom" type="text" class="form-control" id="nom" disabled>
                    </div>
                    <input hidden type="text" name="idPatient" value="<?= $rdv["patientId"] ?>">
                    <input hidden type="text" name="idRdv" value="<?= $rdv["rdvId"] ?>">

                    <label for="rdvDate" class="form-label mt-3">Date du rendez-vous : </label>
                    <span class="text-danger"><?=$arrayError["rdvDate"] ?? "" ?></span>
                                           
                    <input value="<?= !isset($_POST["modifyBtnRdv"]) ? $displayDate : explode(" ",$rdv["dateHour"])[0] ?>" name="rdvDate" type="<?= $displayType ?>" placeholder="24/12/2021" class="form-control" id="rdvDate" required <?= isset($_POST["modifyBtnRdv"]) || count($arrayError) != 0 ? "" : "disabled"; ?>>


                    <label for="rdvTime" class="form-label mt-3">Choissez l'horaire du rendez-vous :</label>
                    <span class="text-danger"><?=$arrayError["rdvTime"] ?? " "?> </span>                
                    <input value="<?= isset($_POST["rdvTime"]) ? htmlspecialchars($_POST["rdvTime"]) : $time ?>" name="rdvTime" type="time" class="form-control" id="rdvTime" placeholder="" required <?= isset($_POST["modifyBtnRdv"]) ? "" : "disabled"; ?>>

                    <div class="text-center mt-4">
                        <a href="gestionRdv.php" class="btn btn-outline-secondary">Retour gestions des rdv</a>
              
                        <?php if (!isset($_POST["modifyBtnRdv"])) { ?>
                            <button type="submit" value="<?= $rdv["rdvId"] ?>" name="modifyBtnRdv" class="btn btn-outline-primary">Modifier le rendez-vous</button>
                        <?php } elseif ((!isset($_POST["updateBtnRdv"]) && count($arrayError) == 0)) { ?>
                            <button type="submit" name="updateBtnRdv" class="btn btn-outline-success">Enregistrer les modifications</button>

                        <?php   } ?>
                    </div>







                </div>
            </form>
        <?php   } ?>
    </div>

     <!-- toast -->

     <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Hopital Gouzou</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                La modification du rendez-vous ?? ??t?? r??alis?? avec succ??s.
            </div>
        </div>
    </div>





    <footer class="mt-5 ">
        <div>
            <h2 class="text-center fs-6 p-4">@ LaManu 2022</h2>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        var toastTrigger = document.getElementById('liveToastBtn')
        var toastLiveExample = document.getElementById('liveToast')
     

        if (<?= $modifyRdvOk ?>) {
            var toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        }
    </script>

</body>

</html>