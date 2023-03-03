<?php 

    class User{
        private int $id;
        private String $email;
        private String $nom;
        private String $prenom;
        private bool $isAdmin;

        public function __construct(int $id, String $email, String $nom, String $prenom, bool $isAdmin){
            $this->id = $id;
            $this->email = $email;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->isAdmin = $isAdmin;
        }

        public function getId(): int { return $this->id; }
        public function getEmail(): String { return $this->email; }
        public function getNom(): String { return $this->nom; }
        public function getPrenom(): String { return $this->prenom; }
        public function isAdmin(): bool { return $this->isAdmin; }

        public function getPseudo(): String {
            return ucfirst($this->nom) . " " . ucfirst($this->prenom);
        }

        public static function connexionForm(){
            echo '
                <form name="user.connexion" action="" method="post">
                    <label for="email">Email</label><br/>
                    <input type="email" name="email" id="email" required/><br/><br/>

                    <label for="password">Mot de passe</label><br/>
                    <input type="password" name="password" id="password" required/><br/><br/>

                    <input type="submit" name="connexion" value="Connexion"/>
                </form>
            ';
        }
    }

?>