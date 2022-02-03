<?php
require '../controllers/ultimateController.php';


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
    <h2 class="text-center mt-4">Ultimate renseignements</h2>

    <div class="container text-center">
        <a class="mt-5 mb-5 btn btn-outline-secondary" href="home.php">Retour</a>





        <?php foreach ($ultimateArray as $ultimate) { ?>
            <div class="border border-dark mt-3 col-5 mx-auto backCard"> <br>
                <p>Nom : <?= $ultimate['lastName'] ?></p>
                <p>Prénom :<?= $ultimate['firstName'] ?></p>
                <p>Date de naissance : <?= $ultimate['birthDate'] ?></p>
                <p>Carte de fidélité : <?= $ultimate['cardNumber'] ?></p>
                <p>Numéro de carte : <?= $ultimate['type'] ?></p>
                
            </div>
        <?php } ?>

        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>