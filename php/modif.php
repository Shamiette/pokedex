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

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_pokemon = $_POST['id_pokemon'];
        $nbVue = $_POST['nbVue'];
        $nbAttrape = $_POST['nbAttrape'];
        $id_dresseur = $_SESSION['id_dresseur'];

        $flux = connectionDB();
        $infoDresseur = infoDresseur($flux, $id_dresseur, $id_pokemon);

        if (empty($infoDresseur)) {
            insert($flux, $nbVue, $nbAttrape, $id_dresseur, $id_pokemon);
        }
        else {
            update($flux, $nbVue, $nbAttrape, $id_dresseur, $id_pokemon);
        }
        closeDB($flux);
        header("Location:../index.php");
    
    }
    
?>