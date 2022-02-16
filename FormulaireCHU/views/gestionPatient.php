<?php

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

    <a href="https://icons8.com/icon/MS2XYm4irEPy/user"></a>

    <title>Gestion Patients</title>
</head>

<header class="mb-5">

    <div class="row">
        <a class="col-lg btn btn-outline-secondary fs-3" href="home.php?results=home">Accueil</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="addPatient.php?results=addPatient">Ajout d'un patient</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="infoPatient.php?results=infoPatient">Informations patients</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="gestionRdv.php?results=gestionRdv">Information des rendez-vous</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="rdv.php?results=rdv">Ajout d'un Rdv</a>
       
    </div>
</header>


<div class="container mycontainer col-10 mt-4">

    <h1 class="text-center mt-5 mb-5 ">Listes des patients</h1>


    <table class="table shadow p-5">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Informations patient</th>
                <th scope="col">Rendez-vous patient</th>
                <th scope="col">Supprimer la fiche patient</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($gestionArray as $patient) { ?>
                <tr>
                    <th scope="row"><?= $patient['lastname'] ?></th>
                    <td><?= $patient['firstname'] ?></td>
                    <td>
                        <form action="infoPatient.php" method="post">
                            <!-- input de type hidden = input non visible coté FRONT 
                            il permet de recuperer une valeur à l'aide du Name-->

                            <input type="hidden" name="idPatient" value="<?= $patient["id"] ?>">
                            <button class="btn btn-outline-primary btn-sm">Plus d'info</button>
                        </form>
                    </td>
                    <td>
                        <form action="rdv.php" method="post">
                            <!-- input de type hidden = input non visible coté FRONT 
                            il permet de recuperer une valeur à l'aide du Name-->

                            <input type="hidden" name="idPatient" value="">
                            <button class="btn btn-outline-success btn-sm">Gestion RDV</button>
                        </form>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $patient["id"] ?>">
                            Supprimer fiche
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-<?= $patient["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer fiche patient</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p> Attention, vous etes sur le point de supprimer une fiche patient</p>
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