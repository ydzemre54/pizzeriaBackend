<?php
require(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require "Database.php";
session_start();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['password'])) {
    $db = Database::getInstance();
    $password = hash('sha256', $_POST['password']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    
    $stmt = $db->prepare('INSERT INTO client(nom_client,prenom_client,adresse_client,telephone_client,email_client,mot_de_passe_client) VALUES(:nom, :prenom, :adresse, :tel, :email, :pass)');
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'adresse' => $adresse,
        'tel' => $tel,
        'email' => $email,
        'pass' => $password,
        
    ]);
    header('location: index.php');
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        form {
            width: 400px;
            margin: auto;
            margin-top: 10px;

        }

        h1 {
            margin: 15px;
        }
        h6{
            position: absolute;
            margin-left: 10px;
        }
        input{
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <header>
        <img src="img/logo2.jpg" alt="logo pizzeria">
    </header>
    <main>
        <h1>Inscription:</h1>
        <form method="post" action="formRegister.php">
            <input type="hidden" name="id" id="id"><br>
            <input type="text" name="nom" id="nom" placeholder="Nom"><br>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom"><br>
            <input type="text" name="adresse" id="adresse" placeholder="Adresse"><br>
            <input type="text" name="tel" id="tel" placeholder="Téléphone"><br>
            <input type="text" name="email" id="email" placeholder="Email"><br>
            <input type="password" name="password" id="password" placeholder="Mot de passe"><br>
            <input class="bouton" type="submit" value="Envoyer">
            <input class="bouton" type="reset" value="effacer">
        </form>
    </main>
    <h6><a href="index.php">Revenir à la page de connexion</a></h6>
    <?php

    ?>
</body>

</html>