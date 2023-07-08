<?php 
    class DataBase{
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct()
        {
            $this -> host = 'localhost';
            $this -> db = 'prueba';
            $this -> user = 'root';
            $this -> password = '';
            $this -> charset = 'utf8_spanish_ci';
        }

        function connect(){
           try {
            $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db."","root","");
            return $pdo;
           } catch (PDOException $e) {
            echo $e->getMessage();
           }
        }
    }
?>