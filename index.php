<?php
session_start();
$erreurLog = false;

require(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require "Database.php";

if (isset($_POST['prenom']) && isset($_POST['password'])) {
    try {
        $db = Database::getInstance();
        $password = hash('sha256', $_POST['password']);
        $prenom = $_POST['prenom'];

        $query = $db->prepare('SELECT id_client from client where prenom_client = :prenom and mot_de_passe_client =:password');
        $query->execute([
            'prenom' => $prenom,
            'password' => $password,
        ]);
        $user = $query->fetch();
        if ($user == false) {
            throw new Exception("Utilisateur introuvable");
        }
        $_SESSION['prenom'] = $_POST['prenom'];
        header('location: home.php');
    } catch (Exception $e) {
        $erreurLog = $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        form {
            width: 400px;
            margin: auto;
            margin-top: 30px;
        }

        .bouton {
            margin-top: 10px;
        }

        h1 {
            margin: 15px;
        }

        h6 {
            text-align: center;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php
   
    ?>
    <header>
        <img src="./img/logo2.jpg" alt="logo pizzeria">
    </header>
    <main>
        <h1>Connexion:</h1>
        <form method="post" action="index.php">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            <input type="password" name="password" id="password" placeholder="Mot de passe"><br>
            <input class="bouton" type="submit" value="Envoyer">
            <input class="bouton" type="reset" value="effacer">
        </form>
        <h6>Vous n'avez pas de compte?<a href="formRegister.php">Inscrivez vous</a></h6>
        <?php

        ?>
    </main>
    

    <?php
    if ($erreurLog != false) {
    ?>
        <div class="alert alert-danger" role="alert" id="err">
            <?php echo $erreurLog;
            ?>
        </div>
    <?php
    }
    ?>
</body>

</html>













