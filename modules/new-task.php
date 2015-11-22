<?php

use \Table\Task;

$id_client = isset($_POST['id']) ? $_POST['id'] : false;

if(!$id_client){
	echo 'id client manquant';
	die();
}

$task = new Task();
$id_task = $task->addTask($id_client);

?>

<li class="task" data-task-id="<?= $id_task; ?>" >

	<div class="description">Nouvelle tâche...</div>
	
	<!-- <select name="personne">
	    <option value="choix1" selected="selected"></option>
	    <option value="choix2">Mohamed</option>
	    <option value="choix3">Arnaud</option>
	    <option value="choix4">Sophie</option>
	    <option value="choix4">Moi</option>
	</select> -->
	<div class="status">
    	<select name="status">
		    <option value="" selected></option>
		    <option value="progress">en cours</option>
		    <option value="finish">OK</option>
		    <option value="preprod">PREPROD</option>
		    <option value="prod">PROD</option>
		    <option value="trash">supprimer</option>
		</select>
	</div>
</li>