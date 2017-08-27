<?php
	require_once('../control/core.php');	
	$reservations=Model::load("reservations");
	$rech="";

	//--------------------------------------------------------------------
	if(isset($_POST['FormFiche'])&&isset($_POST['MODE'])){
		if($_POST['MODE']=="MODIF"){
			if($reservations->update($_POST)){
				echo '<script>alert("Modification effectuée")</script>';
				require_once('../control/reservations_fich.php');
			}
			$_POST['RECH_FICH']=$_POST['ID'];
		}
		else{
			if($reservations->insert($_POST)){
				echo '<script>alert("Ajout effectué")</script>';
				require_once('../control/reservations_fich.php');
			}
		}
	}
	else{
		if(isset($_POST['FormFicheAjout'])){
			$_POST['RECH_FICH']='';
			$reservations->data[0]['Idreserve']='';
			$reservations->data[0]['DateDebut']='';
			$reservations->data[0]['DateFin']='';
			$reservations->data[0]['Id_voiture']='';
			$reservations->data[0]['Id_client']='';	
			echo vue::rtv_fiche($reservations,"../control/reservations_fich.php","ID","AJOUT");
		}
		else{
				if(!(isset($_POST['FormModeAjax']) && $_POST['FormModeAjax'] == "1")){
					$rech = $_POST['RECH_FICH'];
					$reservations->InnerJoinDB($rech,"r");
					echo vue::rtv_fiche($reservations,"../CONTROL/reservations_fich.php","ID");
				}
		}
	}

?> 
