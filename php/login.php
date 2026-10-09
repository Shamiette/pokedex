<?php
    //affichage des erreurs côté PHP et côté MYSQLI
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //Import du site - A completer
    require_once("../includes/config-bdd.php");
    require_once("../includes/constantes.php");
    include("functions-DB.php");
    include("functions_query.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        /*
        echo "Nom d'utilisateur : ".$login."<br>" ;
        echo "Mot de passe : ".$password ;
        */

        $flux = connectionDB();

        $dresseur = is_dresseur($flux, $login, $password);

        if (empty($dresseur)) {
            closeDB($flux);
            header("Location:../connection.php");
        }
        else {
            session_start();
            $_SESSION['login'] = $dresseur[0]['login'];
            $_SESSION['password'] = $dresseur[0]['password'];
            $_SESSION['id_dresseur'] = $dresseur[0]['id_dresseur'];
            $_SESSION['connected'] = true;
            closeDB($flux);
            header("Location:../index.php");
        }
    
    }
    
?>