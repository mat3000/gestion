<?php

use \Table\Client;

$id = isset($_POST['id']) ? $_POST['id'] : false;
$name = isset($_POST['name']) ? $_POST['name'] : false;
$val = isset($_POST['val']) ? $_POST['val'] : false;

if(!$id&&!$name&&!$val){
	if(!$id) echo '- id client manquant -';
	if(!$name) echo '- name manquant -';
	if(!$val) echo '- value manquant -';
	die();
}

$client = new Client();
echo $client->updateClient($id, $name, $val);

