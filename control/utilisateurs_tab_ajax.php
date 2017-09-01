<?php
	require_once('../control/core.php');
	
	if(!(isset($rech))){
		$rech='';
	}
	if(isset($_POST['RECH_AJAX'])){
		$rech = $_POST['RECH_AJAX'];
	}
	$utilisateurs=Model::load("utilisateurs");
	$utilisateurs->read('utilisateur "Login", code "Code ", nom "Nom" , prenom "Prénom", actif "Actif"', $rech );


	require_once('../vue/utilisateurs_tab.php');
?>