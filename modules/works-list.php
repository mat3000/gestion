<pre><?php

	$client = new Table\Client();
	$res = $client->getAllClient();

?></pre>

<ul class="clients">
<?php foreach ($res as $v) : ?>
    <li class="client" data-client-id="<?= $v->id; ?>">
        <span class="label" data-client-id="<?= $v->id; ?>"><?= $v->label; ?></span>
        <ul class="taches">
	        <?php foreach ($v->tasks as $vII) :?>
	            <li class="task" data-task-id="<?= $vII->id; ?>" ><?= $vII->description ?></li>
	        <?php endforeach; ?>
	            <li class="task" >+ Ajouter un tâche...</li>
        </ul>
    </li>
<?php endforeach; ?>
    <li class="client"><span class="label">+ Ajouter un client...</span></li>
</ul>