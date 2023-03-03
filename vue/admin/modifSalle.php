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

    if(isset($_POST["submit"])){
        SalleController::modifSalle();
        header("Location:/ap2/vue/admin/listSalle.php");
    }

    if(!isset($_GET["id"])){ header("Location:/ap2/vue/admin/listSalle.php"); }

    Template::header("Modifier salle", array(), array());
    Template::menu();
    Salle::modifSalleForm($_GET["id"]);
    Template::footer();