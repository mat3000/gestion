<pre><?php

	use Table\Client;
	use Table\Status;

	$client = new Client();
	$allClient = $client->getAllClient();

	$status = new Status();

	//var_dump($allClient);
	// var_dump($statusTask);

?></pre>

<ul class="clients">
<?php foreach ($allClient as $client) : ?>
    <li class="client" data-client-id="<?= $client->id; ?>">
        <span class="label" data-client-id="<?= $client->id; ?>"><span class="icon icon-down-open"></span><?= $client->label; ?></span>
       	<?= $client->tasks ?>
    </li>
<?php endforeach; ?>
    <li class="new-client"><span class="">+ Ajouter un client...</span></li>
</ul>