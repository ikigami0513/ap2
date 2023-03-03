<?php 

    require(dirname(__DIR__) . "/Database.class.php");

    class SalleDatabase extends Database{
        public function addSalle(string $nom, int $type){
            $stmt = $this->pdo->prepare("
                INSERT INTO salle(nom, type) VALUES (?, ?);
            ");
            $stmt->execute(array($nom, $type));
        }

        public function getSalles(){
            $stmt = $this->pdo->prepare("
                SELECT s.id, s.nom, t.typeSalle FROM salle s INNER JOIN typeSalle t ON s.type = t.id;
            ");
            $stmt->execute(array());
            return $stmt->fetchall();
        }

        public function getSalle(int $id){
            $stmt = $this->pdo->prepare("
                SELECT s.id, s.nom, t.id as \"idType\" FROM salle s INNER JOIN typeSalle t ON s.type = t.id WHERE s.id = ?;
            ");
            $stmt->execute(array($id));
            return $stmt->fetchall();
        }

        public function modifSalle(int $id, string $nom, int $type){
            $stmt = $this->pdo->prepare("
                UPDATE salle SET nom = ?, type = ? WHERE id = ?;
            ");
            $stmt->execute(array($nom, $type, $id));
        }

        public function removeSalle(int $id){
            $stmt = $this->pdo->prepare("
                DELETE FROM salle WHERE id = ?;
            ");
            $stmt->execute(array($id));
        }
    }