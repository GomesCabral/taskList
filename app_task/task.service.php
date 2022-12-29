<?php

use FTP\Connection;

    class TaskService{

        private $connection;
        private $task;

        public function __construct($connection, $task){
            $this->connection = $connection->connection();
            $this->task = $task;
        }

        //CRUD
        public function create(){
            $query = "INSERT INTO tb_tasks(task)VALUES(:task)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':task', $this->task->__get('task'));
            $stmt->execute();
        }

        public function read(){
            
        }

        public function update(){
            
        }

        public function delete(){
            
        }
    }
?>