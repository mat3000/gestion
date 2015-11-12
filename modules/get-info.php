<?php

	$id = isset($_POST['id']) ? $_POST['id'] : false;
	$type = isset($_POST['type']) ? $_POST['type'] : false;

	if($type==='task'){
		$task = new Task();
		$res = $task->get_task($id);

		// var_dump($res);
		
?>
<div class="detail">

	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="description"><?= $res->description; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="status"><?= $res->status; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="Assigner à"><?= $res->assign_to; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="note"><?= $res->note; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="estimation"><?= $res->estimated_time; ?></div></div>
	<div class="input"><label>O </label><div class="test" contenteditable="true" placeholder="file"></div></div>

</div>
<?php
	}elseif($type==='client'){
		$client = new Clients();
		$res = $client->get_client($id);
		echo '<pre>';
		var_dump($res);
		echo '</pre>';

?>
<div class="detail">


</div>
<?php
	}

?>





