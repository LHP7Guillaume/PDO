<?php

require_once '../controllers/addPatientController.php';


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

    <title>formulaire</title>
</head>

<body class="">
    <header class="mb-5">
      
        <div class="row">
        <a class="col-lg btn btn-outline-secondary fs-3" href="home.php?results=home">Accueil</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="gestionPatient.php?results=gestionPatient">Gestion des patients</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="infoPatient.php?results=infoPatient">Informations patients</a>
        <a class="col-lg btn btn-outline-secondary fs-3" href="gestionRdv.php?results=gestionRdv">Gestion des rendez-vous</a>
    </div>
    </header>



    

    <div class="container mycontainer mt-5 col-6 mt-3 mb-5 shadow p-5">

        <h1 class="text-center mt-4">Nouveau patient</h1>

        <?php if ($addPatientOk) { ?>
            <p>Le patient a bien été enregistré</p>
            <a href="addPatient.php" class="btn btn-primary">Ajouter un nouveau patient</a>
        <?php } else { ?>



            <form action="" method="POST" novalidate>
                <div class="mb-3">
                    <label for="nom" class="form-label mt-3">Nom : </label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "" ?>" name="nom" type="text" class="form-control" id="nom" placeholder="Ex : Dupont..." required>

                    <label for="prenom" class="form-label mt-3">Prénom : </label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? "";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "" ?>" name=" prenom" type="text" class="form-control" id="prenom" placeholder="Ex : Jean..." required>

                    <label for="birthDate" class="form-label mt-3">Date de naissance : </label><span class="text-danger">
                        <?=
                        $arrayError["birthDate"] ?? "";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["birthDate"]) ? htmlspecialchars($_POST["birthDate"]) : "" ?>" name=" birthDate" type="date" class="form-control" id="birthDate" placeholder="24/12/2021" required>

                    <label for="phone" class="form-label mt-3">N° de téléphone : </label><span class="text-danger">
                        <?=
                        $arrayError["phone"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : "" ?>" name="phone" type="tel" class="form-control" id="phone" placeholder="061256XXXX" required>

                    <label for="mail" class="form-label mt-3">Adresse mail : </label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" name="mail" type="email" class="form-control" id="mail" placeholder="Ex : hopital@gmail.com" required>

                </div>

                <span class="text-danger">
                    <?=
                    $arrayError["reCaptcha"] ?? " ";
                    ?>
                </span>
                <div class="g-recaptcha" data-sitekey="6LdzPW0eAAAAADJs5UEUokjHWzUNeueMUnl5YAjs"></div>

                <div class="text-center mt-4">
                    <button type="submit" href="" class="btn btn-primary">Enregistrer le nouveau Patient</button>
                </div>
            </form>
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