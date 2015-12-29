<?php

require '../app/Autoloader.php';
Autoloader::register();


$module = isset($_POST['module']) ? $_POST['module'] : false;
if(!$module) die('no module');


if($module){
	
	require "$module.php";

}