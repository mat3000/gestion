<?php

	$type = isset($_POST['type']) ? $_POST['type'] : false;


	$clients = new clients();
	$res = $clients->get_all_client_tache();

	if($type==='object'){
		echo json_encode($res);
		die();
	}

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