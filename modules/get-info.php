<pre><?php

use \Table\Task;
use \Table\Client;

$id = isset($_POST['id']) ? $_POST['id'] : false;
$type = isset($_POST['type']) ? $_POST['type'] : false;

if($type==='task'){

	$task = new Task();
	$res = $task->getTaskById($id);

	// var_dump($res);
		
?></pre>
<div class="detail more-task" data-task-id="<?= $res->id ?>" >

	<div class="truc" ><label><span class="icon icon-box"></span> </label><div class="input-text" name="description" contenteditable placeholder="description"><?= $res->description; ?></div></div>
	<!-- <div class="truc"><label><span class="icon icon-tag"></span></label><div class="input-text" contenteditable="true" placeholder="status"><?= $res->status; ?></div></div> -->
	<div class="truc"><label><span class="icon icon-user-add"></span></label><div class="input-text" name="assign_to" contenteditable="true" placeholder="Assigner à"><?= $res->assign_to; ?></div></div>
	<div class="truc"><label><span class="icon icon-pencil"></span></label><div class="input-text" name="note" contenteditable="true" placeholder="note"><?= $res->note; ?></div></div>
	<div class="truc"><label><span class="icon icon-clock"></span></label><div class="input-text" name="estimated_time" contenteditable="true" placeholder="estimation"><?= $res->estimated_time; ?></div></div>
	<div class="truc"><label><span class="icon icon-attach"></span></label><div class="input-text" contenteditable="true" placeholder="file"></div></div>

</div>
<pre><?php

}elseif($type==='client'){
	$client = new Client();
	$res = $client->getClientById($id);
	
	// var_dump($res);

?></pre>
<div class="detail more-client" data-client-id="<?= $res->id ?>" >
	
	<div class="truc"><label>O </label><div class="input-text" name="label" contenteditable="true" placeholder="label"><?= $res->label; ?></div></div>
	<div class="truc"><label>O </label><div class="input-text" name="url" contenteditable="true" placeholder="url"><?= $res->url; ?></div></div>
	<div class="truc"><label>O </label><div class="input-text" name="note" contenteditable="true" placeholder="note"><?= $res->note; ?></div></div>
<br/>
	<div class="input-button" name="trash" val="1">supprimer</div>

</div>
<?php
	}

?>





