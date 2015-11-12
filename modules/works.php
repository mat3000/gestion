<?php

	$clients = new clients();
	$res = $clients->get_all_client_tache();

?>

<ul class="clients">
<?php
    foreach ($res as $v) {

        echo '<li class="client">
                <span class="label">'.$v->label.'</span>
                <ul class="taches">';
                foreach ($v->allTaches as $vII) {
                    echo '<li class="tache">'.$vII->description.'</li>';
                }
        echo    '</ul>
            </li>';
    }
    ?>
</ul>