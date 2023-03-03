<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../../class/Templace.class.php");
    require("../../class/User.class.php");
    require("../../class/Salle.class.php");
    require("../../controller/Salle.Controller.php");

    session_start();
    if(!isset($_SESSION["user"])){ header("Location:/ap2/vue/user/connexion.php"); }
    if(!$_SESSION["user"]->isAdmin()){ header("Location:/ap2/vue/user/espace.php"); }

    Template::header("Lister salle", array("/ap2/css/listSalle.css"), array());
    Template::menu();

    if(isset($_SESSION["success"])){
        echo $_SESSION["success"];
        unset($_SESSION["success"]);
    }

    SalleController::listSalle();
    Template::footer();