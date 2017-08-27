<?php
	require_once('../control/core.php');	
	$clients=Model::load("clients");
//----------------------------------------------------------------------------------------------

	if(isset($_POST['FormFiche'])&&isset($_POST['MODE'])){
		if($_POST['MODE']=="MODIF"){
			if($clients->update($_POST)){
				echo '<script>alert("Modification effectuée")</script>';
				require_once('../control/clients_tab.php');
			}
			$_POST['RECH_FICH']=$_POST['CID']; 
		}
		else{
			if($clients->insert($_POST)){
				echo '<script>alert("Ajout effectué")</script>';
				require_once('../control/clients_tab.php');
			}
		}
	}
	else{
		if(isset($_POST['FormFicheAjout'])){
			$_POST['RECH_FICH']='';
			$clients->data[0]['CID']='';
			$clients->data[0]['Nom']='';
			$clients->data[0]['Prenom'	]='';
			$clients->data[0]['Adresse']='';
			$clients->data[0]['CP']='';
			$clients->data[0]['Localite']='';
			$clients->data[0]['Niss']='';
			$clients->data[0]['Datenaiss']='';
			$clients->data[0]['Numpermis']='';
	
			echo vue::rtv_fiche($clients,"../control/clients_fich.php"," ","AJOUT");
		}
		else{
				if(!(isset($_POST['FormModeAjax']) && $_POST['FormModeAjax'] == "1")){
					$clients->id[0]=$_POST['RECH_FICH'];	
					$clients->read('idclients "CID", nomclient "Nom", prenomclient "Prenom" , adresse "Adresse", cp "CP", localite "Localite", niss "Niss", datnais "Datenaiss", numpermis "Numpermis" ');
					echo vue::rtv_fiche($clients,"../CONTROL/clients_fich.php","CID");
				}
		}
	}

?> 
