<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../../class/Templace.class.php");
    require("../../controller/User.Controller.php");

    session_start();
    if(isset($_SESSION["user"])) { header("Location:/ap2/vue/index.php"); }

    if(isset($_POST["connexion"])){ UserController::connexion($_POST); }

    Template::header("Connexion", array(), array());
    Template::menu();
    User::connexionForm();
    if(isset($_SESSION["fail"])){
        echo $_SESSION["fail"];
        unset($_SESSION["fail"]);
    }
    Template::footer();

?>