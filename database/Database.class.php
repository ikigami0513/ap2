<?php 

    class Database{
        protected PDO $pdo;

        public function __construct(){
            $host = "127.0.0.1";
            $db = "ap2";
            $user = "root";
            $pass = "root123?";
            $dsn = "mysql:host=$host;dbname=$db";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            try{
                $this->pdo = new PDO($dsn, $user, $pass, $options);
            }catch (\PDOException $e){
                print "Erreur : $e";
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }

?>