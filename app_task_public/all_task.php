<?php
	$acao = 'recover';
	require 'task_controller.php';

	// echo '<pre>';
    // print_r($tasks);	VEM DE TASK CONTROLLER
    // echo '</pre>';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App List Task</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function edit(id, txt_task){
				//CREATE A FORM
				let form = document.createElement('form');
				form.action = 'task_controller.php?acao=update';
				form.method = 'POST';
				form.className = 'row';

				//CREATE INPUT
				let inputTask = document.createElement('input');
				inputTask.type = 'text';
				inputTask.name = 'task';
				inputTask.className = 'col-9 form-control';
				inputTask.value = txt_task;

				//SAVE THE TASK ID
				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id;

				//CREATE A BUTTON
				let buttonTask = document.createElement('button');
				buttonTask.type ='submit';
				buttonTask.className = 'col-3 btn btn-info';
				buttonTask.innerHTML = 'Update';

				//INCLUIR INPUTTAKS NO FORM
				form.appendChild(inputTask);

				//INCLUIR INPUTIDS NO FORM
				form.appendChild(inputId);

                //APPEND TO FORM
                form.appendChild(buttonTask);


				// console.log(form);

				// SELECT DIV TASK
				let task = document.getElementById('task_'+id);

				//CLEAN TEXT TO INCLUDE THE FORM
				task.innerHTML = '';

				//INCLUDE THE FOR TO THE PAGE
				//insertBefore allows to insert an element in the element already rendered
				task.insertBefore(form, task[0]);
			}

			function deleteTask(id){
				location.href = 'all_task.php?acao=deleteTask&id='+id
			}

		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App List Task
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Pending Tasks</a></li>
						<li class="list-group-item"><a href="new_task.php">New task</a></li>
						<li class="list-group-item active"><a href="#">All task</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>All task</h4>
								<hr />

								<?php foreach($tasks as $key => $task) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="task_<?= $task->id ?>">
										<?= $task->task ?> (<?= $task->status ?>)
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="deleteTask(<?= $task->id ?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onClick="edit(<?= $task->id ?>, '<?= $task->task ?>')"></i>
										<i class="fas fa-check-square fa-lg text-success"></i>
									</div>
								</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>