<?php

    class Task{
        private $id;
        private $id_status;
        private $task;
        private $register_date;

        public function __get($att){
            return $this->$att;
        }

        public function __set($att, $value){
            $this->$att = $value;
        }
    }
?>