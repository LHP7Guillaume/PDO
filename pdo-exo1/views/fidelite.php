<?php
require '../controllers/fideliteController.php';


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

    <title>PDO-exo1</title>
</head>

<body class="backExo">

    <h1 class="text-center mt-4">Exercice PDO : Colyseum</h1>
    <h2 class="text-center mt-4">Carte de fidélité</h2>

    <div class="container text-center">
        <a class="mt-5 btn btn-outline-secondary" href="home.php">Retour</a>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Type de carte</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($fideliteArray as $fidelite) { ?>
                    <tr>
                        <th scope="row"><?= $fidelite['id'] ?></th>
                        <td><?= $fidelite['lastName'] ?></td>
                        <td><?= $fidelite['firstName'] ?></td>
                        <td><?= $fidelite['birthDate'] ?></td>
                        <td><?= $fidelite['type'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        
    </div>