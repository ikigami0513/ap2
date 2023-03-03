<?php 

    class Salle{
        private String $nom;
        private String $type;

        public function __construct(String $nom, String $type){
            $this->nom = $nom;
            $this->type = $type;
        }

        public function getNom(): String{ return $this->nom; }
        public function getType(): String{ return $this->type; }

        public static function getSelectType(){
            return "
                <select id=\"type\" name=\"type\">
                    <option value=\"1\">salle de réunion</option>
                    <option value=\"2\">amphithéatre</option>
                    <option value=\"3\">salle multimédia</option>
                </select>
            ";
        }

        public static function addForm(){
            echo "
                <form action=\"\" method=\"post\">
                    <label for=\"nom\">Nom</label><br/>
                    <input type=\"text\" name=\"nom\" id=\"nom\" required/><br/><br/>
                    <label for=\"type\">Type</label><br/>".
                    Salle::getSelectType() . "<br/><br/>
                    <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Ajouter\"/>
                </form>
            ";
        }

        public static function modifSalleForm(int $id){
            $db = new SalleDatabase();
            $datas = $db->getSalle($id);
            if(count($datas) == 1){
                $data = $datas[0];
                echo "
                    <form action=\"\" method=\"post\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value=\"" . $data["id"] . "\"/>
                        <label for=\"nom\">Nom</label><br/>
                        <input type=\"text\" id=\"nom\" name=\"nom\" value=\"" . $data["nom"] . "\"><br/><br/>
                        <label for=\"type\">Type</label><br/>
                        <select id=\"type\" name=\"type\">
                ";

                if($data["idType"] == 1)
                    echo "<option value=\"1\" selected>salle de réunion</option>";
                else
                    echo "<option value=\"1\">salle de réunion</option>";

                if($data["idType"] == 2)
                    echo "<option value=\"2\" selected>amphithéatre</option>";
                else
                    echo "<option value=\"2\">amphithéatre</option>";

                if($data["idType"] == 3)
                    echo "<option value=\"3\" selected>salle multimédia</option>";
                else
                    echo "<option value=\"3\">salle multimédia</option>";

                echo "
                        </select><br/><br/>

                        <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Modifier\"/>
                    </form>
                ";
            }
            else{
                echo "Aucune salle n'a été trouvée. Merci d'en sélectionner une dans cette <a href=\"/ap2/vue/admin/listSalle.php\">liste</a>";
            }
        }

        public static function reservationSalleForm(){
            echo "
                <form action=\"\" method=\"post\">
                    <label for=\"type\">Type</label><br/>
                    " . Salle::getSelectType() . "<br/><br/>
                    <label for=\"date\">Date</label><br/>
                    <input type=\"date\" id=\"date\" name=\"date\" required/><br/><br/>
                    <label for=\"heure\">Heure</label><br/>
                    " . Salle::getHeureSelect() . "<br/><br/>
                    <label for=\"salle_dispo\">Salle(s) disponible(s)</label><br/>
                    <select id=\"salle_dispo\" name=\"salle_dispo\">
                    </select>
                </form>
            ";
        }

        public static function getHeureSelect(){
            $select = "
                <select id=\"heure\" name=\"heure\">
            ";
            for($i=8; $i<20; $i++){
                $select .= "<option value=\"$i:00:00\">$i:00</option>";
            }
            $select .= "</select>";
            return $select;
        }
    }

?>