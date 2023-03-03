<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../../class/Salle.class.php");
    require("../../database/class/Salle.Database.php");

    session_start();
    header("Content-Type: application/json");

    if(!isset($_SESSION["user"])) { 
        echo json_encode([
            "error" => "no user session"
        ]);
        exit();
    }

    if(!isset($_POST["type"]) && !isset($_POST["date"]) && !isset($_POST["heure"])){
        echo json_encode([
            "error" => "missing data"
        ]);
        exit();
    }

    $type = htmlspecialchars($_POST["type"]);
    $date = htmlspecialchars($_POST["date"]);
    $heure = htmlspecialchars($_POST["heure"]);
    $db = new SalleDatabase();
    $salles = $db->getSallesDispo($type, $date, $heure);
    echo json_encode($salles);