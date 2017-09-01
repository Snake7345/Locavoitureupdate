<?php
	require_once('../control/core.php');
	
	if(!(isset($rech))){
		$rech='';
	}
	if(isset($_POST['RECH_AJAX'])){
		$rech = $_POST['RECH_AJAX'];
	}
	$clients=Model::load("clients");
	$clients->read('idclients "CID", nomclient "Nom", prenomclient "Prenom" , adresse "Adresse", cp "CP", localite "Localite", niss "Niss", datnais "Datenaiss", numpermis "Numpermis" ', $rech );
	
	require_once('../vue/clients_tab.php');
?>