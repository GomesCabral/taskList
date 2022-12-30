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
            $query = 'SELECT t.id, s.status, t.task FROM tb_tasks AS t LEFT JOIN tb_status AS s ON (t.id_status = s.id)';
		    $stmt = $this->connection->prepare($query);
		    $stmt->execute();
		    return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function update(){
          $query = "UPDATE tb_tasks SET task= :task WHERE id = :id";
          $stmt = $this->connection->prepare($query);
          $stmt->bindValue(':task', $this->task->__get('task'));
          $stmt->bindValue(':id', $this->task->__get('id'));
          return $stmt->execute();
        }

        public function delete(){
            
        }
    }
?>