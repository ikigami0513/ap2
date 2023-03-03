<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../class/User.class.php");
    require("../class/Templace.class.php");

    session_start();
    Template::header("Maison des Ligues Lorraine", array(), array());
    Template::menu();
    Template::footer();

?>