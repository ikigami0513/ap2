<?php 

    require(dirname(__DIR__) . "/class/User.class.php");
    require(dirname(__DIR__) . "/database/class/User.Database.php");

    class UserController{
        public static function connexion(array $post){
            if(!empty($post["email"]) and !empty($_POST["password"])){
                $db = new UserDatabase();
                $datas = $db->connexion($post["email"]);

                if(count($datas) == 1){
                    $data = $datas[0];
                    if(htmlspecialchars(md5($post["password"])) == $data["password"]){
                        $_SESSION["user"] = new User(
                            $data["id"],
                            $post["email"],
                            $data["nom"],
                            $data["prenom"],
                            $data["isAdmin"],
                        );
                        header("Location:/ap2/vue/index.php");
                    }else{
                        $_SESSION["fail"] = "L'email et/ou le mot de passe sont incorrects.";
                    }
                }else{
                    $_SESSION["fail"] = "L'email et/ou le mot de passe sont incorrects.";
                }
            }
        }
    }

?>