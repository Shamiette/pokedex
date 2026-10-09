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
            <li><a href="index.php" class="active"> Pokédex </a></li>
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
                        echo '<a href="modification.php"> Modification </a>';
                    }
                ?>
            </li>
        </ul>
    </nav>

	<main class="background3">
        <?php
            $numero = $_GET["numero"] ;
            /* echo $numero ; */
            
            if(isset($_SESSION['connected']) && $_SESSION['connected'] == true){
                displayPokemonDresseur($flux, $numero, $_SESSION['id_dresseur']);
            }
            else{
                displayPokemon($flux, $numero);
            }
        ?>
    </main>

    <?php include ("static/footer.php"); ?>

</body>

<?php
    closeDB($flux);
?>

</html>