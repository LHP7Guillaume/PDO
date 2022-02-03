<?php
require_once '../controllers/homeController.php';
require_once '../controllers/showTypesController.php';
require_once '../controllers/twentyClientsController.php';
require_once '../controllers/fideliteController.php';
require_once '../controllers/spectacleController.php';
require_once '../controllers/ultimateController.php';

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
    <div class="container text-center">
        <a href="allClients.php?results=allClients" class="mt-3 btn btn-outline-dark">Tous les clients</a>
  
        <a href="showTypes.php?results=showTypes" class="mt-3 btn btn-outline-dark">Tous les shows</a>
    
        <a href="twentyClients.php?results=twentyClients" class="mt-3 btn btn-outline-dark">Les 20 premiers clients</a>

        <a href="fidelite.php?results=fidelite" class="mt-3 btn btn-outline-dark">Cartes fidélité</a>

        <a href="mName.php?results=mName" class="mt-3 btn btn-outline-dark">Nom commençant par M</a>

        <a href="spectacle.php?results=spectacle" class="mt-3 btn btn-outline-dark">Liste des spectacles</a>

        <a href="ultimate.php?results=ultimate" class="mt-3 btn btn-outline-dark">Ultimate renseignements</a>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>