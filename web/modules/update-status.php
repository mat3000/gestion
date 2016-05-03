<?php

use \Table\Task;

$id = isset($_POST['id']) ? $_POST['id'] : false;
$name = isset($_POST['name']) ? $_POST['name'] : false;
$val = isset($_POST['val']) ? $_POST['val'] : false;

if(!$id&&!$name&&!$val){
	if(!$id) echo '- id task manquant -';
	if(!$val) echo '- value manquant -';
	die();
}

$task = new Task();
echo $task->updateStatus($id, $val);

