<?php

    // REQUIRE GONNA BE EXECUTED IN TASK_CONTROLLER IN THE PUBLIC FOLDER
    require 'task.model.php';
    require 'task.service.php';
    require 'connection.php';

    echo '<pre>';
    print_r($_POST);
    echo '/<pre>';

    $task = new Task();
    $task->__set('task', $_POST['task']);

    $connection = new Connection();

    $taskService = new TaskService($connection, $task);
    $taskService->create();

    echo '<pre>';
    print_r($taskService);
    echo '/<pre>';
    
?>