<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("../../class/Templace.class.php");
    require("../../class/User.class.php");

    session_start();
    if(!isset($_SESSION["user"])){ header("Location:/ap2/vue/user/connexion.php"); }
    if(!$_SESSION["user"]->isAdmin()){ header("Location:/ap2/vue/user/espace.php"); }

    Template::header("Administration", array(), array());
    Template::menu();
    echo "<a href=\"/ap2/vue/admin/addSalle.php\">Ajouter salle</a><br/>";
    echo "<a href=\"/ap2/vue/admin/listSalle.php\">Lister les salles</a>";
    Template::footer();

?>