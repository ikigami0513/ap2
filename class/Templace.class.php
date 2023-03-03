<?php 

    class Template{
        public static function header(String $title, array $css, array $javascript){
            echo '
                <!Doctype html>
                    <html lang="fr">
                        <head>
                            <title>' . $title . '</title>
                            <meta charset="utf-8"/>
                            <link rel="stylesheet" href="/ap2/css/menu.css"/>
                            <link rel="stylesheet" href="/ap2/css/footer.css"/>
            ';
            foreach($css as $cle=>$value){
                echo '<link rel="stylesheet" href="' . $value . '"/>';
            }
            foreach($javascript as $cle=>$value){
                echo '<script language="javascript" src="' . $value . '"></script>';
            }
            echo '</head><body>';
        }

        public static function menu(){
            echo '
                <nav class="navbar">
                    <a href="/ap2/vue/index.php" class="nav-logo">
                        Maison des Ligues<br/>Lorraine
                    </a>

                    <ul class="nav-menu">
            ';
            if(!isset($_SESSION["user"])){
                echo '
                    <li class="nav-item">
                        <a href="/ap2/vue/user/connexion.php" class="nav-link">
                            Connexion
                        </a>
                    </li>
                ';
            }else{
                if($_SESSION["user"]->isAdmin()){
                    echo '
                        <li class="nav-item">
                            <a href="/ap2/vue/admin/index.php" class="nav-link">
                                Administration
                            </a>
                        </li>
                    ';
                }
                echo '
                    <li class="nav-item">
                        <a href="/ap2/vue/user/reservation.php" class="nav-link">
                            Réservation
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/ap2/vue/user/espace.php" class="nav-link">
                            ' . $_SESSION["user"]->getPseudo() . '
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ap2/vue/user/deconnexion.php" class="nav-link">
                            Déconnexion
                        </a>
                    </li>
                ';
            }

            echo '</ul></nav>';
        }

        public static function footer(){
            echo '
                        <footer></footer>
                    </body>
                </html>
            ';
        }
    }

?>