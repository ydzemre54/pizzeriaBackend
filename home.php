<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthenticPizzeria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        header h6 {
            position: absolute;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['prenom'])) {
        ?>
        <header>
            <img src="img/logo2.jpg" alt="logo pizzeria">
            <a href="./logout.php"><button type="button" class="tomate btn btn-secondary" id="login">déconnexion</button></a>
            <?php
    
            
    
            if (isset($_SESSION["prenom"])) {
            ?>
                <h6>Bienvenue <?php echo $_SESSION["prenom"]; ?>!</h6>
            <?php
            }
            ?>
        </header>
    
        <main>
            <br>
            <br>
            <br>
            <h1>Nos pizzas</h1>
            <a href="./index2.html"><button type="button" class="tomate btn btn-danger" id="filtre">base tomate</button></a>
            <a href="./index3.html"><button type="button" class="creme btn btn-danger" id="filtre">base crème</button></a>
            <a href="./index4.html"><button type="button" class="creme btn btn-danger" id="filtre">toutes nos pizzas</button></a>
    
    
            <br>
            <div class="container">
            </div>
            </div>
        </main>
        <footer>
            <br>
            <a href="./indexcommande.html"><button type="button" class="btn btn-primary">Commander maintenant</button></a>
    
            <br>
            <p>publicité:</p>
            <img src="img/yes.jpg" alt="">
            <br>
            <br>
            <br>
            <br>
            <div class="tel">
                <h3>Nos coordonnées:</h3>
                <h6>N°tel: 07 07 07 07 07</h6>
                <h6>Adresse: 8 rue du berger allemand 75001 Paris</h6>
                <h6>Email: AuthenticPizzeria@afpa.fr</h6>
            </div>
    
        </footer>
    </body>
    <?php
    }else {
        header('location: index.php');
    }
    ?>
    