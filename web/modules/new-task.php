<?php

use \Table\Task;
use \Table\Status;

$id_client = isset($_POST['id_client']) ? $_POST['id_client'] : false;

if(!$id_client){
	echo 'id client manquant';
	die();
}

$task = new Task();
$status = new Status();

$id_task = $task->addTask($id_client);

?>
<li class="task" data-task-id="<?= $id_task; ?>" data-task-status="<?php $status->getStatusByTaskId($id_task); ?>" >
	<?= $status->getStatusByTaskIdHTML($id_task); ?>
	<div class="description">Nouvelle tâche...</div>
</li>