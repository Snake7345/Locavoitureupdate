<?php
	require_once('../control/core.php');
	
	if(!(isset($rech))){
		$rech='';
	}
	if(isset($_POST['RECH_AJAX'])){
		$rech = $_POST['RECH_AJAX'];
	}

	$voitures=Model::load("voitures");

	$voitures->read('voitureID "ID", marque "Marque", modele "Modele" , couleur "Couleur", plaque "Plaque", louee "Louee", actif "Actif"', $rech );
	
	require_once('../vue/voitures_tab.php');
?>