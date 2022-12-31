<?php

    // REQUIRE GONNA BE EXECUTED IN TASK_CONTROLLER IN THE PUBLIC FOLDER

    require 'task.model.php';
    require 'task.service.php';
    require 'connection.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    // echo $acao;

    if($acao == 'insert'){

        // echo '<pre>';
        // print_r($_POST);
        // echo '/<pre>';

        $task = new Task();
        $task->__set('task', $_POST['task']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        $taskService->create();
        
        header('Location: new_task.php?include=1');
        
    }else if($acao == 'recover'){

        $task = new Task();
        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        $tasks = $taskService->read();

    }else if($acao == 'update'){
        // echo '<pre>';
        // print_r($_POST);
        // echo '/<pre>';
        $task = new Task();
        $task->__set('id', $_POST['id']);
        $task->__set('task', $_POST['task']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);
        
        if($taskService->update()){
            header('Location: all_task.php');
        }

    }else if($acao == 'deleteTask'){
        $task = new Task();
        $task->__set('id', $_GET['id']);

        $connection = new Connection();
        $taskService = new TaskService($connection, $task);

        if($taskService->delete()){
            header('Location: all_task.php');
        }

    }else if($acao == 'checkTask'){

        $task = new Task();
        $task->__set('id', $_GET['id']);
        $task->__set('id_status', 2);

        $connection = new Connection();
        
        $taskService = new TaskService($connection, $task);

        $taskService->checkTask();

        header('Location: all_task.php');
    }
?>