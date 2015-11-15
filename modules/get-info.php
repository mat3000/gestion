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
<div class="detail" data-client-id="<?= $res->id ?>" >

	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="description"><?= $res->description; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="status"><?= $res->status; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="Assigner à"><?= $res->assign_to; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="note"><?= $res->note; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="estimation"><?= $res->estimated_time; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="file"></div></div>

</div>
<pre><?php

}elseif($type==='client'){
	$client = new Client();
	$res = $client->getClientById($id);
	
	// var_dump($res);

?></pre>
<div class="detail" data-client-id="<?= $res->id ?>" >

	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="label"><?= $res->label; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="url"><?= $res->url; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="note"><?= $res->note; ?></div></div>

</div>
<?php
	}

?>





