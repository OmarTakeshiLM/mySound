<?php
    namespace Lib;
    use PDO;

    class DB extends PDO {
        private $hostname = 'localhost';
        private $database = 'b5ojcad';
        private $username = 'root';
        private $password = '';
        private $pdo;
        private $bConnected = false;

        public function __construct() {
            $dsn = 'mysql:dbname='.$this->database.';host='.$this->hostname;
            $this->pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }

        public function CloseConnection() {
            $this->pdo = null;
        }

        public function insert($query) {
            try {
                $stmt = $this->pdo->prepare($query);
                return $stmt->execute();
            } catch (PDOException $e) {
                echo "Error ".$e;
            } catch (Exception $e) {
                echo "Echo ".$e;
            }
        }

        public function read($query) {
            $sentence = $this->pdo->prepare($query);
            $sentence->execute(); 
            // Devuelve array idexado
            $data = $sentence->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        public function readAll($query) {
            $sentence = $this->pdo->prepare($query);
            $sentence->execute(); 
            // Devuelve array idexado
            $data = $sentence->fetchAll(PDO::FETCH_CLASS);
            return $data;
        }

    }