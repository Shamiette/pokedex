<?php

//affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Import du site - A completer
require_once("./includes/config-bdd.php");
require_once("./includes/constantes.php");      //constantes du site
include("./php/functions-DB.php");
include("./php/functions_query.php");
include("./php/functions_structure.php");

?>
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
    $flux = connectionDB();
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
                        echo '<a href="php/logout.php">Déconnexion</a>';
                    } else {
                        echo '<a href="connection.php">Connexion</a>';
                    }
                ?>
            </li>
            <li>
                <?php
                    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
                        echo '<a href="modification.php" class="active"> Modification </a>';
                    }
                ?>
            </li>
        </ul>
    </nav>

	<main class="background2">
        <?php  
            $pokemons = getPokemons($flux);
        ?>
        <div class="container_form">
            <h3 class="titre_pokedex">Modification Pokedex</h3>

            <form action="php/modif.php" method="POST">
                <div>
                    <label for="pokemon" class="text_pokedex">Choisis un Pokémon :</label>
                    <select name="id_pokemon" id="pokemon" class="form-control" required>
                        <option value="">-- Sélectionner --</option>
                        <?php foreach ($pokemons as $pokemon): ?>
                            <option value="<?= $pokemon['id_pokemon'] ?>">
                                <?= $pokemon['nom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="nbVue" class="text_pokedex">Nombre de fois ou le pokémon est vue : </label><br>
                    <input type="nbVue" id="nbVue" name="nbVue" class="form-control" required>
                </div>

                <div>
                    <label for="nbAttrape" class="text_pokedex">Nombre de fois ou le pokémon est attrapé : </label><br>
                    <input type="nbAttrape" id="nbAttrape" name="nbAttrape" class="form-control" required>
                </div>

                <button type="submit" class="button">Modifier</button>
            </form>
        </div>
    </main>

    <?php include ("static/footer.php"); ?>

</body >

<?php
    closeDB($flux);
?>

</html>