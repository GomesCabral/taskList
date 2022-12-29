<?php

    class Connection{

        private $host = 'localhost';
        private $dbname = 'data_base';
        private $user = 'root';
        private $password = '';

        public function connection(){
            try{
                $connection = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->password"
                );
                return $connection;

            }catch(PDOException $e){
                echo '<p> Error: ' . $e->getMessage() . '</p>';
            }
        }
    }
?>