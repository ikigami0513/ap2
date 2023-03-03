<?php 

    require(dirname(__DIR__) . "/Database.class.php");

    class UserDatabase extends Database{
        public function connexion(String $email): array{
            $stmt = $this->pdo->prepare("
                SELECT id, nom, prenom, isAdmin, password
                FROM user
                WHERE email = ?;
            ");
            $stmt->execute(array($email));
            return $stmt->fetchall();
        }
    }

?>