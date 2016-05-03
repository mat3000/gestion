<pre><?php

use \Table\Task;
use \Table\Client;
use \Table\Status;

$id = isset($_POST['id']) ? $_POST['id'] : false;
$type = isset($_POST['type']) ? $_POST['type'] : false;

if($type==='task'){

	$task = new Task();
	$status = new Status();
	$res = $task->getTaskById($id);
	$statusLabel = $status->getStatusByTaskId($res->id);


	// $time = $task->getStatus_history($res->id);

	// var_dump($res);
	// var_dump($statusTask);


	$history = json_decode($res->status_history);

	$start = null;
	$end = null;
	if($history){
		foreach ($history as $v) {
			echo $v->status .'->'. $v->date . '<br>';

			if($v->status==2) {
				$start = $v->date;
				$end= null;
			}

			if($v->status==3 ||$v->status==4 ||$v->status==5) $end = $v->date;

			if($v->status==1 ) $start = null; 
		}
	}

	if( $start && $end ){
		echo '$start : ' . $start . '<br>';
		echo '$end : ' . $end . '<br>';

		echo  $end - $start;
	}
		
?></pre>
<div class="detail more-task" data-task-id="<?= $res->id ?>" data-task-status="<?= $statusLabel ?>" >
	
	<div class="truc" >
		<?= $status->getStatusByTaskIdHTML($id) ?>
		<div class="wrap">
			<div class="input input-text" name="description" contenteditable="true" placeholder="description"><?= $res->description ?></div>
		</div>
	</div>
	<div class="truc">
		<span class="icon icon-user-add"></span>
		<div class="wrap">
			<div class="input input-select" name="assign_to" empty="aucune" placeholder="Assigner à">
				<?php foreach ($res->allUsers as $user) {
					$default = '';
					if($res->assign_to==$user->id) $default='default';
					echo "<div class=\"select $default\" value=\"{$user->id}\">{$user->name}</div>";
				} ?>
			</div>
		</div>
	</div>
	<div class="truc">
		<span class="icon icon-pencil"></span>
		<div class="wrap">
			<div class="input input-text" name="note" contenteditable="true" placeholder="notes"><?= $res->note ?></div>
		</div>
	</div>
	<div class="truc" >
		<span class="icon icon-doc-text-inv"></span>
		<div class="wrap">
			<div class="input input-text" contenteditable placeholder="sous-tâches"></div>
		</div>
	</div>
	<div class="truc">
		<span class="icon icon-clock"></span>
		<div class="wrap">
			<div class="input input-text" name="estimated_time" contenteditable="true" placeholder="estimation"><?= $res->estimated_time ?></div>
		</div>
	</div>
	<div class="truc">
		<span class="icon icon-clock"></span>
		<div class="wrap">
			<div class="input input-text disable" contenteditable="false" placeholder="time"></div>
		</div>
	</div>
	<div class="truc">
		<span class="icon icon-attach"></span>
		<div class="wrap">
			<div class="input input-text" contenteditable="true" placeholder="fichier"></div>
		</div>	
	</div>

</div>
<pre><?php

}elseif($type==='client'){
	$client = new Client();
	$res = $client->getClientById($id);
	
	// var_dump($res->Urls);

?></pre>
<div class="detail more-client" data-client-id="<?= $res->id ?>" >
	
	<div class="truc">
		<span class="icon icon-box"></span>
		<div class="wrap">
			<div class="input input-text" name="label" contenteditable="true" placeholder="label"><?= $res->label ?></div>
		</div>	
	</div>
	<div class="truc">
		<span class="icon icon-compass"></span>
		<?php 
		$urls = $res->Urls;
		if(is_object($urls)){
			foreach ($urls as $v) {
		?>
		<div class="wrap">
			<div class="input input-text linked" title="<?= $v ?>" name="url" contenteditable="true" placeholder="url">
				<?= $v ?>
			</div>
			<span class="icon icon-right-circled" ></span>
		</div>	
		<?php 
			}
		}
		?>
		<div class="wrap">
			<div class="input input-text linked" title="<?= $v ?>" name="url" contenteditable="true" placeholder="url"></div>
			<!-- <span class="icon icon-right-circled" ></span> -->
		</div>	
	</div>
	<div class="truc">
		<span class="icon icon-pencil"></span>
		<div class="wrap">
			<div class="input input-text" name="url" contenteditable="true" placeholder="url"><?= $res->note ?></div>
		</div>	
	</div>
	<div class="truc">
		<span class="icon icon-trash"></span>
		<div class="wrap">
			<div class="input input-button" name="trash">supprimer</div>
		</div>	
	</div>
	

</div>
<?php
	}

?>





