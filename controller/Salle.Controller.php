<?php

    require_once(dirname(__DIR__) . "/class/User.class.php");
    require(dirname(__DIR__) . "/database/class/Salle.Database.php");

    class SalleController{
        public static function addSalle(){
            $nom = htmlspecialchars($_POST["nom"]);
            $type = htmlspecialchars(($_POST["type"]));
            $db_salle = new SalleDatabase();
            $db_salle->addSalle($nom, $type);
            return "La salle $nom a bien été rajoutée.";
        }

        public static function listSalle(){
            $db_salle = new SalleDatabase();
            $salles = $db_salle->getSalles();
            echo "
                <div class=\"row\">
                    <div class=\"nom\">Nom</div>
                    <div class=\"type\">Type</div>
                    <div class=\"action\">Actions</div>
                </div>
            ";
            foreach($salles as $value){
                echo "
                    <div class=\"row\">
                        <div class=\"nom\">" . $value["nom"] . "</div>
                        <div class=\"type\">" . $value["typeSalle"] . "</div>
                        <div class=\"action\">
                            <a href=\"/ap2/vue/admin/modifSalle.php?id=" . $value["id"] . "\"><button>Modifier</button></a>
                            <a href=\"/ap2/vue/admin/deleteSalle.php?id=" . $value["id"] . "\"><button>Supprimer</button></a>
                        </div>
                    </div>
                ";
            }
        }

        public static function modifSalle(){
            $id = htmlspecialchars(($_POST["id"]));
            $nom = htmlspecialchars($_POST["nom"]);
            $type = htmlspecialchars($_POST["type"]);
            $db_salle = new SalleDatabase();
            $db_salle->modifSalle($id, $nom, $type);
            $_SESSION["success"] = "<script language=\"javascript\">alert(\"La salle possédant l'id $id a bien été modifiée.\");</script>";
        }

        public static function removeSalle(){
            $id = htmlspecialchars($_GET["id"]);
            $db_salle = new SalleDatabase();
            $db_salle->removeSalle($id);
            $_SESSION["success"] = "<script language=\"javascript\">alert(\"La salle possédant l'id $id a bien été supprimée.\");</script>";
        }

        public static function addReservation(){
            
        }
    }