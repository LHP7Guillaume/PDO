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

<body class="">
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php?results=home">Accueil</a>
            <a class="navbar-brand" href="addPatient.php?results=addPatient">Ajout d'un patient</a>
            <a class="navbar-brand" href="infoPatient.php?results=infoPatient">Informations patients</a>

        </div>
    </nav>

    <h1 class="text-center mt-5 ">Listes des patients</h1>



    <div class="container col-10 mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Informations patient</th>
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Supprimer fiche
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer fiche patient</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attention, vous etes sur le point de supprimer une fiche patient
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-danger">Supprimer</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>