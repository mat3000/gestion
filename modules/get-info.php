<pre><?php

	$id = isset($_POST['id']) ? $_POST['id'] : false;
	$type = isset($_POST['type']) ? $_POST['type'] : false;

	if($type==='task'){
		$task = new Task();
		$res = $task->get_task($id);
	}elseif($type==='client'){
		$client = new Client();
		$res = $client->get_client($id);
	}

	var_dump($res);

?></pre>



