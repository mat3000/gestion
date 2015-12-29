<?php

use \Table\Client;

$client = new Client();
$id_client = $client->addClient();

?><li class="client" id="client-<?= $id_client; ?>" data-client-id="<?= $id_client; ?>">
    <span class="label" data-client-id="<?= $id_client; ?>">Nouveau client...</span>
    <ul class="taches">
        <li class="new-task" data-client-id="<?= $id_client; ?>">+ Ajouter un tâche...</li>
    </ul>
</li>