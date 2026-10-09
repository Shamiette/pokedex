<!DOCTYPE html>
<html lang="fr">

<head>
	<meta name = "author" content = "sbreneliere"/>
	<meta name = "Keywords" content = "esir, html, BDD-IHM, TP3"/>
	<link rel="icon" href="images/logo.png"/>
	<title> Pokedex </title>
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<?php
    session_start();
?>

<body>
    <?php include ("static/header.php"); ?>
    
    <nav>
        <ul>
            <li><a href="index.php"> Pokédex </a></li>
            <li>
                <?php
                    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
                        echo '<a href="php/logout.php" class="active">Déconnexion</a>';
                    } else {
                        echo '<a href="connection.php" class="active">Connexion</a>';
                    }
                ?>
            </li>
            <li>
                <?php
                    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
                        echo '<a href="modification.php"> Modification </a>';
                    }
                ?>
            </li>
        </ul>
    </nav>

	<main class="background2">
        <div class="container_form">
            <h3 class="titre_pokedex">Connexion Dresseur</h3>

            <form action="php/login.php" method="POST">
                <div>
                    <label for="login" class="text_pokedex">Nom d'utilisateur :</label><br>
                    <input type="text" id="login" name="login" class="form-control" required>
                    <!-- required : le formulaire ne peut être validé que si le champ est rempli -->
                </div>

                <div>
                    <label for="password" class="text_pokedex">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="button">Se connecter</button>
            </form>
        </div>
    </main>

    <?php include ("static/footer.php"); ?>

</body>

</html>