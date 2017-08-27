<?php
	require_once('../control/core.php');
	
	if(!(isset($rech))){
		$rech='';
	}
	if(isset($_POST['RECH_AJAX'])){
		$rech = $_POST['RECH_AJAX'];
	}
	
	$reservations=Model::load("reservations");
	//$reservations->read('id_reserv "Idreserve", id_voiture "IdVoiture ", DateDebut "Datedeb" , DateFin "Datefin" , id_client "Idclient"', $rech );
	$reservations->InnerJoinDB($rech);
	require_once('../vue/reservations_tab.php');
?>