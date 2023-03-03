<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../../class/Templace.class.php");
    require("../../class/Salle.class.php");
    require("../../controller/Salle.Controller.php");

    session_start();
    if(!isset($_SESSION["user"])) { header("Location:/ap2/vue/connexion.php"); }

    if(isset($_POST["submit"])){
        SalleController::addReservation();
    }

    Template::header("Réservation", array(), array());
    Template::menu();
    Salle::reservationSalleForm();
    echo "<script language=\"javascript\" src=\"/ap2/script/reservation.js\"></script>";
    Template::footer();