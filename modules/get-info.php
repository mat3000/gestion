<pre><?php

	$id = isset($_POST['id']) ? $_POST['id'] : false;

	$task = new Task();
	$res = $task->get_task($id);

	var_dump($res);

?></pre>



