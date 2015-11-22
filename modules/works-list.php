<pre><?php

	$client = new Table\Client();
	$res = $client->getAllClient();

	// var_dump($res);

?></pre>

<ul class="clients">
<?php foreach ($res as $v) : ?>
    <li class="client" id="client-<?= $v->id; ?>" data-client-id="<?= $v->id; ?>">
        <span class="label" data-client-id="<?= $v->id; ?>"><?= $v->label; ?></span>
        <ul class="taches">
	        <?php foreach ($v->tasks as $vII) :?>
	            <li class="task <?= $vII->status ?>" data-task-id="<?= $vII->id; ?>" >
	            	<!-- <span class="status"></span> -->
	            	<?= $vII->description ?>
	            	
	            	<!-- <select name="personne">
					    <option value="choix1" selected="selected"></option>
					    <option value="choix2">Mohamed</option>
					    <option value="choix3">Arnaud</option>
					    <option value="choix4">Sophie</option>
					    <option value="choix4">Moi</option>
					</select> -->
					<div class="status">
		            	<select name="status">
						    <option value="" <?= $vII->status==='' ? 'selected' : ''; ?>></option>
						    <option value="progress" <?= $vII->status==='progress' ? 'selected' : ''; ?>>en cours</option>
						    <option value="done" <?= $vII->status==='done' ? 'selected' : ''; ?>>OK</option>
						    <option value="preprod" <?= $vII->status==='preprod' ? 'selected' : ''; ?>>PREPROD</option>
						    <option value="prod" <?= $vII->status==='prod' ? 'selected' : ''; ?>>PROD</option>
						    <option value="trash">supprimer</option>
						</select>
					</div>
	            </li>
	        <?php endforeach; ?>
	            <li class="new-task" data-client-id="<?= $v->id; ?>">+ Ajouter un tâche...</li>
        </ul>
    </li>
<?php endforeach; ?>
    <li class="new-client"><span class="">+ Ajouter un client...</span></li>
</ul>