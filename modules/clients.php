<?php

	$action = isset($_POST['action']) ? $_POST['action'] : false;
	if(!$action) die('no action');
	
	$clients = new clients();

	if($action==='get_all_clients'){

		$res = $clients->methode();

		echo json_encode($res);

	}