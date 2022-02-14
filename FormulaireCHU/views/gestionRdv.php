<?php

require_once '../controllers/gestionRdvController.php';



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
                    
                    <th scope="col">Supprimer le rdv</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($patients as $patient) { ?>
                    <tr>
                        <th scope="row"><?= $patient['firstname'] ?></th>
                        <td><?= $patient['lastname'] ?></td>
                        <td><?= $patient['dateHour'] ?></td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $patient["id"] ?>">
                            Supprimer fiche
                        </button>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-<?= $patient["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer fiche patient</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p> Attention, vous etes sur le point de supprimer le rdv patient</p>
                                        <p><?= $patient["lastname"] . " " . $patient["firstname"] ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                        <form action="" method="POST">
                                            <input type="hidden" name="idDeletePatient" value="<?= $patient["id"] ?>">
                                            <button type="submit" name="deletePatient" class="btn btn-danger">Supprimer</button>
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

    <footer class="mt-5 ">
        <div>
            <h2 class="text-center fs-6 p-4">@ LaManu 2022</h2>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>