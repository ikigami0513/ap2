<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../../class/Templace.class.php");
    require("../../class/Salle.class.php");
    require("../../controller/Salle.Controller.php");

    session_start();
    if(!isset($_SESSION["user"])) { header("Location:/ap2/vue/connexion.php"); }

    Template::header("Réservation", array(), array());
    Template::menu();
    Salle::reservationSalleForm();
    Template::footer();