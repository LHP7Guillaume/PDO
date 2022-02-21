<?php

require_once '../controllers/gestionRdvController.php';

// permet d'afficher la date en français :

$days = [1 => "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
$month = [1 => "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];

// conversion date en bon format en francais mais ne fonctionne pas en l'etat sur mac a revoir
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR', 'fr_FR.utf8', 'fra', 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');

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

<body class="">
    <header class="mb-5">

        <div class="row">
            <a class="col-lg btn btn-outline-secondary fs-3" href="home.php?results=home">Accueil</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="gestionPatient.php?results=gestionPatient">Gestion des patients</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="infoPatient.php?results=infoPatient">Informations patients</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="addPatient.php?results=addPatient">Ajout un patient</a>
            <a class="col-lg btn btn-outline-secondary fs-3" href="rdv.php?results=rdv">Ajout d'un Rdv</a>
        </div>
    </header>


    <div class="container mycontainer col-10 mt-4 shadow">

        <h1 class="text-center mt-5 mb-5 ">Gestion des rendez-vous</h1>


        <table class="table shadow p-5">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date et horaire du rdv</th>
                    <th scope="col">Informations rdv</th>
                    <th scope="col">Supprimer le rdv</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($appointments as $patient) { ?>
                    <tr>
                        <th scope="row"><?= $patient['firstname'] ?></th>
                        <td><?= $patient['lastname'] ?></td>
                        <td><?= $days[date("N", strtotime($patient['dateHour']))] . " " . date("j", strtotime($patient['dateHour'])) . " " .  $month[date("n", strtotime($patient['dateHour']))] . " " . date("Y, H:i", strtotime($patient['dateHour'])) ?></td>
                        <td>

                            <form action="updateRdv.php" method="post">
                                <!-- input de type hidden = input non visible coté FRONT 
                            il permet de recuperer une valeur à l'aide du Name-->

                                <input type="hidden" name="idRdv" value="<?= $patient["rdvId"] ?>">
                                <button class="btn btn-outline-primary btn-sm">Plus d'info</button>
                            </form>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $patient["rdvId"] ?>">
                                Supprimer Rdv
                            </button>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-<?= $patient["rdvId"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer rendez-vous patient</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><span class="text-danger">Attention, vous etes sur le point de supprimer le rdv du : </span><br>
                                            <?= $days[date("N", strtotime($patient['dateHour']))] . " " . date("j", strtotime($patient['dateHour'])) . " " .  $month[date("n", strtotime($patient['dateHour']))] . " " . date("Y, H:i", strtotime($patient['dateHour'])) ?></p>
                                        <p><?= $patient["lastname"] . " " . $patient["firstname"] ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                        <form action="" method="POST">
                                            <input type="hidden" name="idDeleteRdv" value="<?= $patient["rdvId"] ?>">
                                            <button type="submit" name="deleteRdv" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>

                <?php } ?>


            </tbody>
        </table>
    </div>

    <!-- toast -->

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Hopital Gouzou</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                La suppression du rendez-vous à été réalisé avec succès.
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
      

        if (<?= $deleteRdvOk ?>) {
            var toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        }
    </script>


</body>

</html>