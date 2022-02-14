<?php

require_once '../controllers/homeController.php';


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

    <title>PDO-Doctolib</title>
</head>

<body class="mybody">
    <header class="mb-5">
        <nav class="navbar navbar-light bg-light ">
            <div class="container-fluid justify-content-center">
                <!-- <a class="navbar-brand" href="addPatient.php?results=addPatient">Ajout d'un patient</a>
            <a class="navbar-brand" href="gestionPatient.php?results=gestionPatient">Gestion des patients</a>
            <a class="navbar-brand" href="infoPatient.php?results=infoPatient">Informations patients</a> -->
                <h1 class="">Gestionnaire de patient</h1>
            </div>
        </nav>
    </header>

    <div class="container overflow-hidden mt-5">
        <div class="row text-center g-4">
            <div >
                <a class="myPhoto mybutton m-2 col-lg-4 btn btn-outline-secondary fs-3 text-white" href="addPatient.php?results=addPatient">Ajout d'un patient</a>
                <a class="myPhotoTwo mybutton m-2 col-lg-4 btn btn-outline-secondary fs-3 text-white" href="gestionPatient.php?results=gestionPatient">Gestion des patients</a>
            </div>
            <div>
                <a class="myPhotoThree mybutton m-2 col-lg-4 btn btn-outline-secondary fs-3 text-white" href="infoPatient.php?results=infoPatient">Informations patients</a>
                <a class="myPhotoFour mybutton m-2 col-lg-4 btn btn-outline-secondary fs-3 text-white" href="gestionRdv.php?results=gestionRdv">Gestion des rendez-vous</a>
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

</body>

</html>