<?php

	$clients = new Clients();
	$res = $clients->get_all_client();

?>

<ul class="clients">
<?php foreach ($res as $v) : ?>
    <li class="client" data-client-id="<?= $v->id; ?>">
        <span class="label"><?= $v->label; ?></span>
        <ul class="taches">
	        <?php foreach ($v->allTask as $vII) : ?>
	            <li class="task" data-task-id="<?= $vII->id; ?>" ><?= $vII->description ?></li>
	        <?php endforeach; ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>